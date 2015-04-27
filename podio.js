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
 refreshToken: function(callback) {
  var url = "https://podio.com/oauth/token?grant_type=refresh_token&client_id=" +
   this.id + "&client_secret=" + this.s + "&refresh_token=" +
   this.tokeninfo.refresh_token
 },
 parseHash: function(hash) {
  var ret = {}, info = hash.slice(1).split('&')
  for (var i = 0; i < info.length; i++) {
   ret[info[i].split('=')[0]] = info[i].split('=')[1]
  }
  return ret
 },
 retrieveTokeninfo: function() {
  this.tokeninfo = {}
  this.tokeninfo.access_token = localStorage.getItem('podio.access_token')
  this.tokeninfo.token_type = localStorage.getItem('podio.token_type')
  this.tokeninfo.refresh_token = localStorage.getItem('podio.refresh_token')
  this.tokeninfo.time = localStorage.getItem('podio.time')
 },
 saveTokenInfo: function() {
  localStorage.setItem('podio.access_token', this.tokeninfo.access_token)
  localStorage.setItem('podio.token_type', this.tokeninfo.token_type)
  localStorage.setItem('podio.refresh_token', this.tokeninfo.refresh_token)
  localStorage.setItem('podio.time', Math.floor(new Date().getTime() / 1000))
 },
 post: function(api, body, callback) {
  d3.xhr('https://api.podio.com' + api, 'application/json')
    .post(JSON.stringify(body), callback)
 },
 getStringsStudents: function() {
  this.post('/item/app/10468839/filter/22482207/', this.displayStudents)
 }
}