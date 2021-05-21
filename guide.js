var x = document.getElementById("guide");
var v=document.getElementById("div1");
var displayCount = document.getElementById("displayCount");
var count=1;
x.onclick = function(){
  if(count%2==0) {
       count=count+1;
        displayCount.innerHTML = count;
       var item = document.getElementById("frame1");
       item.parentNode.removeChild(item);
    } else {
        count=count+1;
          displayCount.innerHTML = count;
           var item1 = document.getElementById("frame1");
           v.innerHTML = '<iframe id="frame1" src="guide1.php" title="guide" align="right"></iframe>';
           item1.parentNode.appendChild(v);
    }
}
