// EXECUTE COMMANDS
function execute() {
  var split = command.value.toString().split(" ");
  if (command.value == 'time' || command.value == 'date') {
    // Get current date and time
    // time
    var date = new Date();
    var y = date.getFullYear();
    var m = date.getMonth();
    var d = date.getDate();
    var h = date.getHours();
    var i = date.getMinutes();
    var s = date.getSeconds();
    if (y < 1000) {y = '0' + y}
    if (m < 10) {m = '0' + m}
    if (d < 10) {d = '0' + d}
    if (h < 10) {h = '0' + h}
    if (i < 10) {i = '0' + i}
    if (s < 10) {s = '0' + s}
    var result = d + '/' + m + '/' + y + ' ' + h + ':' + m + ':' + s;
  } else if (command.value == 'epoch') {
    // Get current UNIX epoch
    // epoch
    var date = new Date();
    var result = date.getTime();
  } else if (command.value == 'home' || command.value == 'hsis') {
    // Go to HSIS home page
    // home // hsis
    window.location.href = 'hsis.php';
  } else if (command.value == 'index' || command.value == 'main') {
    // Go to the entity index page
    // index // main
    var ret = window.location.href.replace('/hsis.php','');
    window.location.href = ret + '/#';
  } else if (command.value == 'info' || command.value == 'details') {
    // Get current entity info
    // info // details
    window.location.href = 'info.php';
  } else if (command.value == 'start' || command.value == 'platform') {
    // Start installed platform
    // start // platform
    window.location.href = 'start.php';
  } else if (command.value == 'release' || command.value == 'version') {
    // Read platform release file
    // release // version
    window.location.href = 'release.php';
  } else if (command.value == 'update') {
    // Base system update
    // update
    pkg = 'base';
    dist = 'unswp';
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    }
    xmlhttp.open("POST","get.php?pkg="+pkg+"&dist="+dist,true);
    xmlhttp.send();
  } else if (command.value == 'switch' || command.value == 'sw') {
    // Switch mode (Light/Dark)
    // switch // sw
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    };
    xmlhttp.open("GET","switch.php",true);
    xmlhttp.send();
  } else if (command.value == 'convert' || command.value == 'conv') {
    // Convert all values inside this entity
    // convert // conv
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    };
    xmlhttp.open("GET","convert.php",true);
    xmlhttp.send();
  } else if (command.value == 'gender' || command.value == 'gen') {
    // Switch entity gender (Male/Female)
    // gender // gen
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    };
    xmlhttp.open("GET","gender.php",true);
    xmlhttp.send();
  } else if (command.value == 'alter') {
    // Get filename display standard mode
    // alter
    var name = 'alter';
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.location.reload();
      }
    }
    xmlhttp.open("POST","delete.php?name="+name,true);
    xmlhttp.send();
  } else if (split[0] == 'alter') {
    // Get filename display mode alternative
    // alter dispmode
    var name = 'alter';
    var content = split[1];
    var dataString = 'name=' + name + '&content=' + content;
    $.ajax({
      type: "POST",
      url: "write.php",
      data: dataString,
      cache: false,
      success: function(html) {window.location.reload();}
    });
    return false;
  } else if (command.value == 'find' || command.value == 'all') {
    // List all files inside an entity
    // find // all
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        xmlhttp.open("GET","hsis.php?q=",true);
        xmlhttp.send();
      }
    };
    window.location.href = "hsis.php?q=";
  } else if (command.value == 'dir' || command.value == 'sub') {
    // Lists all subentities inside an entity
    // dir // sub
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        xmlhttp.open("GET","hsis.php?q=/",true);
        xmlhttp.send();
      }
    };
    window.location.href = "hsis.php?q=/";
  } else if (command.value == 'kill' || split[0] == 'good' && split[1] == 'riddance') {
    // Destroy current entity
    // kill // good riddance
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "../hsis.php";
      }
    };
    xmlhttp.open("POST","kill.php",true);
    xmlhttp.send();
  } else if (split[0] == 'rev' || split[0] == 'reverse') {
    // Reverse a string
    // rev text // reverse text
    var string = split[1];
    var splitString = string.split("");
    var reverseArray = splitString.reverse();
    var joinArray = reverseArray.join("");
    var result = joinArray;
  } else if (split[0] == 'lock') {
    // Lock current entity with password
    // lock password
    var password = split[1];
    var dataString = 'password=' + password;
    $.ajax({
      type: "POST",
      url: "lock.php",
      data: dataString,
      cache: false,
      success: function(html) {
        window.location.href = 'hsis.php';
      }
    });
    return false;
  } else if (split[0] == 'run' || split[0] == 'open') {
    // Launch app or open file
    // run filename // open filename
    window.location.href = split[1];
  } else if (split[0] == 'edit') {
    // Edit file using text editor
    // edit filename
    var name = split[1];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        xmlhttp.open("POST","edit.php?name="+name,true);
        xmlhttp.send();
      }
    }
    window.location.href = "edit.php?name="+name;
  } else if (split[0] == 'mkdir') {
    // Create a new directory
    // mkdir filename
    var name = split[1];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.location.reload();
      }
    }
    xmlhttp.open("POST","mkdir.php?name="+name,true);
    xmlhttp.send();
  } else if (split[0] == 'touch' || split[0] == 'create') {
    // Create a new empty file
    // touch filename // create filename
    var name = split[1];
    var content = encodeURIComponent("");
    var dataString = 'name=' + name + '&content=' + content;
    $.ajax({
      type: "POST",
      url: "write.php",
      data: dataString,
      cache: false,
      success: function(html) {}
    });
    return false;
  } else if (split[0] == 'write' || split[0] == 'save') {
    // Write contents to file
    // write filename content // save filename content
    var name = split[1];
    var content = encodeURIComponent(split[2]);
    var dataString = 'name=' + name + '&content=' + content;
    $.ajax({
      type: "POST",
      url: "write.php",
      data: dataString,
      cache: false,
      success: function(html) {}
    });
    return false;
  } else if (split[0] == 'rm' || split[0] == 'del') {
    // Delete file or empty directory
    // rm filename // del filename
    var name = split[1];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.location.reload();
      }
    }
    xmlhttp.open("POST","delete.php?name="+name,true);
    xmlhttp.send();
  } else if (split[0] == 'mv' || split[0] == 'move') {
    // Move or rename file
    // mv filename filename1 // move filename filename1
    var name = split[1];
    var to = split[2];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.location.reload();
      }
    }
    xmlhttp.open("POST","move.php?name="+name+"&to="+to,true);
    xmlhttp.send();
  } else if (split[0] == 'cp' || split[0] == 'copy') {
    // Copy file
    // cp filename filename1 // copy filename filename1
    var name = split[1];
    var to = split[2];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.location.reload();
      }
    }
    xmlhttp.open("POST","copy.php?name="+name+"&to="+to,true);
    xmlhttp.send();
  } else if (split[0] == 'kill') {
    // Remove certain entity
    // kill entity
    var id = split[1];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    };
    xmlhttp.open("POST",id+"/kill.php",true);
    xmlhttp.send();
  } else if (split[0] == 'upvote' || split[0] == 'up') {
    // Upvote certain entity
    // upvote entity // up entity
    var id = split[1];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    };
    xmlhttp.open("GET","upvote.php?id="+id,true);
    xmlhttp.send();
  } else if (split[0] == 'downvote' || split[0] == 'down') {
    // Downvote certain entity
    // downvote entity // down entity
    var id = split[1];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    };
    xmlhttp.open("GET","downvote.php?id="+id,true);
    xmlhttp.send();
  } else if (split[0] == 'init' || split[0] == 'start') {
    // Initialize an entity (start a new one)
    // init entity // start entity
    var name = split[1];
    var type = "";
    var title = encodeURIComponent("");
    var description = encodeURIComponent("");
    var dataString = 'name=' + name + '&type=' + type + '&title=' + title + '&description=' + description;
    $.ajax({
      type: "POST",
      url: "init.php",
      data: dataString,
      cache: false,
      success: function(html) {}
    });
    return false;
  } else if (split[0] == 'get' && split[2] == 'from') {
    // Get new package
    // get repo from user
    pkg = split[1];
    dist = split[3];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    }
    xmlhttp.open("POST","get.php?pkg="+pkg+"&dist="+dist,true);
    xmlhttp.send();
  } else if (split[0] == 'setup' && split[2] == 'by') {
    // Reinstall to another platform
    // setup repo by user
    pkg = split[1];
    dist = split[3];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        window.location.href = "hsis.php";
      }
    }
    xmlhttp.open("POST","setup.php?pkg="+pkg+"&dist="+dist,true);
    xmlhttp.send();
  } else if (split[0] == 'info' || split[0] == 'details') {
    // Get file information
    // info filename // details filename
    var name = split[1];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        xmlhttp.open("POST","file.php?name="+name,true);
        xmlhttp.send();
      }
    }
    window.location.href = "file.php?name="+name;
  } else if (split[0] == 'show' || split[0] == 'render') {
    // Render input
    // show text // render text
    var result = split[1];
  } else if (split[0] == 'find' || split[0] == 'search' || split[0] == 'seek') {
    // Find file by keyword
    // find keyword // search keyword // seek keyword
    var q = split[1];
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    } else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        xmlhttp.open("GET","hsis.php?q="+q,true);
        xmlhttp.send();
      }
    };
    window.location.href = "hsis.php?q="+q;
  } else {
    // Enter any expression to calculate it or solve the equation
    // expression // equation
    var input = command.value;
    if (input.includes('x')) {
      var solve = nerdamer.solve(input, 'x');
      var result = eval(solve);
    } else {
      var result = eval(input);
    }
  }
  command.value = result;
  return result;
}
