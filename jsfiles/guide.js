var x = document.getElementById("guide");
var count=1;
x.onclick = function(){
  if(count%2==0) {
       count=count+1;
       var item = document.getElementById("frame1");
       item.parentNode.removeChild(item);
    } else {
        count=count+1;
          var y = document.getElementById("div1");
           y.innerHTML = '<iframe id="frame1" src="guide1.php" title="guide" align="right"></iframe>';
           document.parentNode.appendChild(y);
    }
}
