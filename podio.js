function podio(clientid, redirecturi) {
 this.id = clientid
 this.url = redirecturi
 this.retrieveTokeninfo();
 this.authenticate()
}
podio.prototype = {
 constructor: podio,
 authenticate: function() {
  if (this.tokeninfo.access_token) {
    return
  }
  var url = "https://podio.com/oauth/authorize?response_type=token&client_id=" +
   this.id + "&redirect_uri=" + encodeURI(this.url)
  if (location.hash.length) {
    // parse the hash for token
    this.tokeninfo = this.parseHash(location.hash)
    this.saveTokenInfo()
  } else {
   location.href = url
  }
 },
 parseHash: function(hash) {
  var ret = hash.slice(1).split('&')
  for (var i = 0; i < ret.length; i++) {
   ret[i] = ret[i].split('=')
  }
 },
 retrieveTokeninfo: function() {
  this.tokeninfo = {}
  this.tokeninfo.access_token = localStorage.getItem('podio.access_token')
  this.tokeninfo.token_type = localStorage.getItem('podio.token_type')
  this.tokeninfo.refresh_token = localStorage.getItem('podio.refresh_token')
 },
 saveTokenInfo: function() {
  localStorage.setItem('podio.access_token', this.tokeninfo.access_token)
  localStorage.setItem('podio.token_type', this.tokeninfo.token_type)
  localStorage.setItem('podio.refresh_token', this.tokeninfo.refresh_token)
 }
}