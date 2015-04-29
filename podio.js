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
 deletehttp: function(api, callback) {
  d3.xhr('https://api.podio.com' + api)
    .header('Authorization', 'OAuth2 ' + this.tokeninfo.access_token)
    .send('DELETE', '', callback)
 },
 getStudents: function(done) {
  this.post('/item/app/10468839/filter/22482207/', {
   limit: 200
  }, done)
 },
 getTeachingArtistClasses: function(done) {
  this.post('/item/app/6558188/filter/24263448/', {}, done)
 },
 getMasterclasses: function(done) {
  this.post('/item/app/6505403/filter/24263446/', {}, done)
 },
 getOtherClasses: function(done) {
  this.post('/item/app/12110848/filter/24263454/', {}, done)
 },
 getRehearsalClasses: function(done) {
  this.post('/item/app/6521115/filter/24263447/', {}, done)
 },
 getAbsences: function(done) {
  this.post('/item/app/6505430/filter/all_by_date/', {}, done)
 },
 setMasterclasses: function(data) {
  d3.select('thead').select('tr').selectAll('th.masterclass')
   .data(data.items)
   .enter().append('th')
   .attr('class', 'masterclass')
   .text(function(d) {
    return d.fields[3].values[0].start_date
   })
 },
 setTeachingArtistClasses: function(data) {
  d3.select('thead').select('tr').selectAll('th.teaching-artist')
   .data(data.items)
   .enter().append('th')
   .attr('class', 'teaching-artist')
   .text(function(d) {
    return d.fields[2].values[0].start_date
   })
 },
 setOtherClasses: function(data) {
  d3.select('thead').select('tr').selectAll('th.other-class')
   .data(data.items)
   .enter().append('th')
   .attr('class', 'other-class')
   .text(function(d) {
    return d.fields[1].values[0].start_date
   })
 },
 setRehearsalClasses: function(data) {
  d3.select('thead').select('tr').selectAll('th.rehearsal-class')
   .data(data.items)
   .enter().append('th')
   .attr('class', 'rehearsal-class')
   .text(function(d) {
    return d.fields[3].values[0].start_date
   })
 },
 showStudents: function() {
  this.getData(this.displayStudents)
 },
 getData: function(callback) {
  var self = this;
  var c = function(data) {
   data.forEach(function(m) {
    if (m instanceof Array) {
     d3.select('#info').text('ERROR: ' . m[0])
     throw new Error(m[0])
    }
   })
   callback.call(self, data)
  }
  this.collectXhr(c, this.getStudents, this.getMasterclasses,
                  this.getTeachingArtistClasses, this.getOtherClasses,
                  this.getRehearsalClasses, this.getAbsences)
 },
 collectXhr: function() {
  var args = Array.prototype.slice.call(arguments)
  var finalcallback = args.shift()
  var ret = [], done = 0, self = this
  var makeCallback = function(i) {
   return function(error, data) {
    if (error) {
     if (error.status == 401) {
        self.tokeninfo.access_token = false
        self.authenticate({hash:''})
     }
     ret[i] = [error.responseText]
    } else {
     ret[i] = JSON.parse(data.responseText)
    }
    if (++done == args.length) {
     finalcallback(ret)
    }
   }
  }
  for (var i = 0; i < args.length; i++) {
    args[i].call(this, makeCallback(i))
  }
 },
 displayStudents: function(data)
 {
  var students = data[0], masterclasses = data[1], teaching = data[2], other = data[3],
      rehearsalclass = data[4], absences = data[5], self = this
  this.setMasterclasses(masterclasses)
  this.setTeachingArtistClasses(teaching)
  this.setOtherClasses(other)
  this.setRehearsalClasses(rehearsalclass)
  var tr = d3.select('tbody').selectAll('tr')
   .data(students.items)
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
   var classes = ['masterclass', 'teaching-artist', 'other-class', 'rehearsal-class']
   var things = [masterclasses, teaching, other, rehearsalclass]
   things.forEach(function(cb, i) {
    cb.items.forEach(function(m) {
     s.append('td')
      .attr('class', 's_attendance ' + classes[i])
      .attr('id', function(d) {
       return 's_' + d.item_id + '_' + m.item_id
      })
      .append('input')
      .attr('type', 'checkbox')
      .on('change', function(e) {
       self.updateAbsence(this, this.__data__.item_id, m.item_id, this.checked)
      })
    })
   })
  })
  absences.items.forEach(function(a) {
   var id = 's_' + a.fields[0].values[0].value.item_id + '_' + a.fields[1].values[0].value.item_id
   var box = document.getElementById(id).firstChild
   box.checked = true
   box.__absence__ = a.item_id
   if (a.fields[2].values[0].value.id == 2) {
    box.disabled = true
    box.setAttribute('title', 'Excused absence')
   }
  })
 },
 newAbsence: function(checkbox, student, missed_class) {
  checkbox.disabled = true
  this.post('/item/app/6505430/', {
   fields: {
    'absent-student': student,
    'masterclass': missed_class,
    'excused-2': 1
   }
  }, function(error, data) {
   checkbox.disabled = false
   if (error) {
    alert('Saving absence failed, try again')
    checkbox.checked = false
   } else {
    checkbox.__absence__ = JSON.parse(data.responseText).item_id
   }
  })
 },
 removeAbsence: function(checkbox) {
  checkbox.disabled = true
  this.deletehttp('/item/' + checkbox.__absence__, function(error, data) {
   checkbox.disabled = false
   if (error) {
    alert('Deleting absence failed, try again')
    checkbox.checked = true
   } else {
    checkbox.__absence__ = null
   }
  })
 },
 updateAbsence: function(box, student, missed_class, is_absent) {
  if (is_absent) {
   this.newAbsence(box, student, missed_class)
  } else {
   this.removeAbsence(box)
  }
 }
}