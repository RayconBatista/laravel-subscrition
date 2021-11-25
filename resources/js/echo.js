window.Echo.channel('registered-message')
           .listen('SendMessageContact', (e) => {
             console.log(e);
           })