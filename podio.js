function podio(clientid, redirecturi) {
 this.id = clientid
 this.url = redirecturi
 this.tokeninfo = {
  access_token: false
 }
}
podio.prototype = {
 constructor: podio,
 authenticate: function(location) {
  if (this.tokeninfo.access_token) {
    return
  }
  var url = "https://podio.com/oauth/authorize?response_type=token&client_id=" +
   this.id + "&redirect_uri=" + encodeURI(this.url)
  if (location.hash.length) {
   console.log("parsing hash " + location.href)
    // parse the hash for token
    this.tokeninfo = this.parseHash(location.hash)
    return true
  } else {
   console.log("no hash " + location.href)
   window.location.replace(url)
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
    .header('Authorization', 'OAuth2 ' + this.tokeninfo.access_token)
    .post(JSON.stringify(body), callback)
 },
 getStringsStudents: function() {
  this.post('/item/app/10468839/filter/22482207/', {
   limit: 200
  }, this.displayStudents)
 },
 displayStudents: function(error, data) {
  if (error) {
   d3.select('#info').text('ERROR: ' + error.responseText)
  } else {
   d3.select('#info').text(data)
  }
 }
}