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
  }, this.collectStudents())
 },
 getThisSemesterMasterclasses: function(s) {
  this.post('/item/app/6505403/filter/24263446/', {}, this.collectMasterclasses(s))
 },
 collectMasterclasses: function(s) {
  var self = this
  return function(error, data) {
   if (error) {
    d3.select('#info').text('ERROR: ' + error.responseText)
   } else {
    self.setMasterclasses(JSON.parse(data.responseText), s)
   }
  }
 },
 setMasterclasses: function(data, s) {
  d3.select('thead').select('tr').selectAll('th.masterclass')
   .data(data.items)
   .enter().append('th')
   .attr('class', 'masterclass')
   .text(function(d) {
    return d.fields[3].values[0].start_date
   })
  this.displayStudents(s, data)
 },
 collectStudents: function() {
  var self = this
  return function(error, data) {
   if (error) {
    d3.select('#info').text('ERROR: ' + error.responseText)
   } else {
    self.getThisSemesterMasterclasses(data)
   }
  }
 },
 displayStudents: function(data, masterclasses)
 {
   var json = JSON.parse(data.responseText)
   var tr = d3.select('tbody').selectAll('tr')
    .data(json.items)
    .enter().append('tr')
    .attr('class', 'student')
    .attr('id', function(d) {return 's_' + d.item_id})
   
   tr.append('td')
    .attr('class', 'student_name')
    .text(function(d) {
      var i = d.fields[1].values
      if (i.length == 1) {
        i = i[0].value.title
      } else {
       i = i.reduce(function(p, s) {
         if (p) {
          p += ', '
         }
         return p + s.value.title
        })
      }
      var t = {
       //id: d.item_id,
       name: d.title,
       instruments: i
      }
      return t.name + ' (' + t.instruments + ')'
     })
   tr.call(function(s) {
      masterclasses.items.each(function (m) {
       s.append('td')
        .attr('class', 's_attendance masterclass')
        .attr('id', function(d) {
          return 's_' + d.item_id + '_' + m.item_id
         })
        .append('input')
        .attr('type', 'checkbox')
      })
     })
 }
}