$content = array(
        'short' => "new content",
        'regular' => "This is regular content",
        'long'=>"this content is the result of long content"

);

echo json_encode($content);



<script>

function replaceText(){
        var target = document.getElementById("main");
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "new_content.php", true);
        xhr.onreadystatechange = function(){
                console.log("ReadyState: " + xhr.readyState);
                if(xhr.readyState ==  4){
                        console.log(xhr.responseText);
                        var json = JSON.parse(xhr.responseText);
                        target.innerHTML = json.short;
                }
        }
        xhr.send();
}


var button = document.getElementById("ajax-button");
button.addEventListener('click', replaceText);



</script>
