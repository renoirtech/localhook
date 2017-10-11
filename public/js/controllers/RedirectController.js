class RedirectController {
    constructor(host, bin) {
        this.host = host;
        this.bin  = bin;
    }

    redirect(event)
    {
        event.preventDefault();

        let environmentUUID = $(event.target).find('select[name="environment"]').val();
        let requestUUID     = $(event.target).find('input[name="request"]').val();

        console.log('Environment: ' + environmentUUID);
        console.log('Request: ' + requestUUID);
        console.log('Bin: ' + this.bin);

        let environment = this.getEnvironment(environmentUUID).responseJSON;
        let request     = this.getRequest(requestUUID).responseJSON;

        console.log(environment);
        console.log(request);

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": environment.url,
            "method": request.method,
            "processData": false,
            "contentType": 'text/json',
            "data": request.body
        }

        console.log(settings);

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    }

    getEnvironment(environmentUUID)
    {
        var settings = {
            "async": false,
            "crossDomain": true,
            "url": this.host+ "/api/environments/" + environmentUUID,
            "method": "GET",
        }

        return $.ajax(settings).done(function (response) {
            return response;
        });
    }

    getRequest(requestUUID)
    {
        var settings = {
            "async": false  ,
            "crossDomain": true,
            "url": this.host+ "/api/requests/" + requestUUID,
            "method": "GET",
        }

        return $.ajax(settings).done(function (response) {
            return response;
        });
    }
}
