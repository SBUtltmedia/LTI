
function postLTI(ses){

var dfd = jQuery.Deferred();
$.post( "postLTI.php", {data:ses} ).done(function(result){

dfd.resolve(result)


});
//setTimeout(function(){dfd.resolve("made it")},5000);
 return dfd.promise();

}
