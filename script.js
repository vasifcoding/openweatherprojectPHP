function getIp(){
var Url = "https://" + "cloudflare.com/cdn-cgi/trace";
var AjaxUrl = new XMLHttpRequest();
AjaxUrl.open("get", Url);
AjaxUrl.send();

AjaxUrl.onreadystatechange = function () {
if (AjaxUrl.readyState === 4 && AjaxUrl.status === 200) {
var resultUrl = AjaxUrl.responseText;

var mapUrlStart = resultUrl.indexOf("ip") + 3;
var mapUrlEnd = resultUrl.indexOf("ts");
var userIP = resultUrl.slice(mapUrlStart, mapUrlEnd);
console.log(userIP);
fetch("https://api.ipgeolocation.io/ipgeo?apiKey=3863ea70fc9342f2a80ffa2dc633ef44&ip="+ userIP).then(response=>response.json()).then(data=>{
    console.log("City : "+data.city);
})
.catch(error=>{
    console.log(error("Error : " + error))
});
}
};


}
getIp();



