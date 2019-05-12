        $( document ).ready(function() {

                $('.summernote').summernote({
                    height: 150,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    toolbar:[
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol']]
                            ]
                });

                //setup before functions
                var typingTimer;                //timer identifier
                var doneTypingInterval = 1000;  //time in ms, 5 second for example

                //on keyup, start the countdown
                $('.inputsearch').keyup(function(){
                    clearTimeout(typingTimer);
                    if ($('.inputsearch').val) {
                            typingTimer = setTimeout(function(){
                                window.location.href = $(".inputsearchURL").val()+'?search='+$(".inputsearch").val();
                        }, doneTypingInterval);
                    }
                });

                
                $('.reda1-repeater-add').click(function(){

                     $( ".reda1-repeater-container:hidden" ).first().show();
                   
                });

                $('.reda1-repeater-delete').click(function(){
                    ID=$(this).attr("id");
                    ID=ID.replace('reda1-repeater-delete-', '');
                    $('#reda1-repeater-container-'+ID).hide();
                });

                $('.reda2-repeater-add').click(function(){

                     $( ".reda2-repeater-container:hidden" ).first().show();
                   
                });

                $('.reda2-repeater-delete').click(function(){
                    ID=$(this).attr("id");
                    ID=ID.replace('reda2-repeater-delete-', '');
                    $('#reda2-repeater-container-'+ID).hide();
                });


                //setup before functions
                var typingTimer;                //timer identifier
                var doneTypingInterval = 5000;  //time in ms (5 seconds)

                //on keyup, start the countdown
                $('.orderitemcode').keyup(function(){
                    clearTimeout(typingTimer);
                    if ($('.orderitemcode').val()) {
                        ID=$(this).attr("id").replace('orderitemcode-', '');
                        typingTimer = setTimeout(doneTyping(ID,$(this).val()), doneTypingInterval);
                    }
                });

                //user is "finished typing," do something
                function doneTyping (ID='',VALUE='') {
                    url=$('.orderitemajaxurl').val()+'?itemcode='+VALUE;

                    $.get(url).done(function(response) {
                        
                        $('#orderitemprice-'+ID).val(response.data.price);
                        $('#orderitemname-'+ID).val(response.data.name);
                        $('#orderitemid-'+ID).val(response.data.id);
                        
                    });
                }

                $('.reda2-repeater-calculate').click(function(){
                        
                        total=0;
                        $(".orderitems").each(function() {
                            total=total+($(this).find(".orderitemprice").val()*$(this).find(".orderitemquantity").val());
                        });
                    $('.ordertotal').val(total);
                    $('.ordergrandtotal').val(Math.round( $('.orderitemtaxes').val()*total ));
                    
                });
                
                
        });

            