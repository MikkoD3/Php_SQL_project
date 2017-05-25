//Js file for Upvotes

$(document).ready(function() {
   $.ajaxSetup({
       url: 'ajaxvote.php',
       type: 'POST',
       cache: 'false'
   });
    

//When voting buttons are clicked
    $('.vote').click(function(){
        var self = $(this);
        var action = self.data('action');
        var parent = self.parent().parent();
        var postid = parent.data('postid');
        var score = parent.data('score');
       
        if (!parent.hasClass('.disabled')) {
            //vote up function
            if (action == 'up') {
                //Increase the vote
                parent.find('.vote-score').html(++score).css({'color':'#00FF4C'});
                //cahnge vote up button color
                self.css({'color':'#00FF4C'});
                //send ajax request
                $.ajax({data: {'postid' : postid, 'action' : 'up'}});
            }
            //voting down
            else if (action == 'down'){
                parent.find('.vote-score').html(--score).css({'color':'red'});
                //Change button
                self.css({'color':'red'});
                //send ajax
                $.ajax({data: {'postid': postid, 'action' : 'down'}});
            };
            
            //Add Disabled class
            parent.addClass('.disabled');
        };
        
        
    });
    
    
    
});

