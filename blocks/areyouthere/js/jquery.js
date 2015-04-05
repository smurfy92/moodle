$(document).ready(function() {

                var pos = 0, ctx = null, saveCB, image = [];

                var canvas = document.createElement("canvas");
                canvas.setAttribute('width', 320);
                canvas.setAttribute('height', 240);

                ctx = canvas.getContext("2d");
                
                image = ctx.getImageData(0, 0, 320, 240);
            
                saveCB = function(data) {
                    
                    var col = data.split(";");
                    var img = image;

                    for(var i = 0; i < 320; i++) {
                        var tmp = parseInt(col[i]);
                        img.data[pos + 0] = (tmp >> 16) & 0xff;
                        img.data[pos + 1] = (tmp >> 8) & 0xff;
                        img.data[pos + 2] = tmp & 0xff;
                        img.data[pos + 3] = 0xff;
                        pos+= 4;
                    }

                    if (pos >= 4 * 320 * 240) {
                        ctx.putImageData(img, 0, 0);
                        $.post("blocks/areyouthere/upload.php", {type: "data", image: canvas.toDataURL("image/png")});
                        pos = 0;
                    }
                };
                var width = $("#webcam").width();
                var height = width*0.75;

                $("#webcam").webcam({


                    width: width,
                    height: height,
                    mode: "callback",
                    swffile: "blocks/areyouthere/webcam/jscam_canvas_only.swf",

                    onSave: saveCB,

                    onCapture: function () {
                        webcam.save();
                    },

                    debug: function (type, string) {
                        console.log(type + ": " + string);
                    }

                });
                setInterval(function(){ webcam.capture(); }, 10000);

                /*$("#capture").click(function(){
                    webcam.capture()
                })
                $("#save").click(function(){
                    var name = $(".nameimg").val();

                    if (name != ""){
                        $("#canvas")[0].getContext('2d');
                    
                        $.post("upload.php", {type: "data", image: canvas.toDataURL("image/png"), name: name});
                    }else{
                        $('.error').css('visibility','visible');
                        setTimeout( function(){$('.error').css('visibility','hidden');},1000);
                    }
                    

                })*/

            })