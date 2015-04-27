function podio(clientid, redirecturi) {
 this.id = clientid
 this.url = redirecturi
 this.s = 
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
  } else {
   location.href = url
  }
 },
 parseHash: function(hash) {
  var ret = {}, info = hash.slice(1).split('&')
  for (var i = 0; i < info.length; i++) {
   ret[info[i].split('=')[0]] = info[i].split('=')[1]
  }
  return ret
 },
 post: function(api, body, callback) {
  d3.xhr('https://api.podio.com' + api, 'application/json')
    .post(JSON.stringify(body), callback)
 },
 getStringsStudents: function() {
  this.post('/item/app/10468839/filter/22482207/', {
   limit: 200
  }, this.displayStudents)
 },
 displayStudents: function(error, data) {
  d3.select('#info').text(data)
 }
}