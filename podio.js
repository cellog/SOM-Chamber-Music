function podio(clientid, redirecturi) {
 this.id = clientid
 this.url = redirecturi
}
podio.prototype = {
 constructor: podio,
 authenticate: function() {
  var url = "https://podio.com/oauth/authorize?response_type=token&client_id=" +
   this.id + "&redirect_uri=" + encodeURI(this.url)
 }
}