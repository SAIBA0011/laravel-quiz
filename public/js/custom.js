$(document).ready(function(){
    //Showing the firs question on site load
    $('ul.questions li.list-group-item:first').addClass('current');
    $('a#submit-single-question').on('click',function(event){
        event.preventDefault();
        $current = $(this).parent().parent()
        $prev = $current;
        $next = $current.next();
        $next.addClass('current');
        $prev.removeClass('current');

    })

    $(document).ready(function () {
        var nextRowID = 0;
        var newName = 1;
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add-question-option'); //Add button selector
        var wrapper = $('.question-options'); //Input field wrapper
        var x = 1; //Initial field counter is 1
        $(addButton).click(function () { //Once add button is clicked

            setTimeout(function () {
                callSummer()
            }, 500);

            console.log('click');
            var id = ++nextRowID;
            var name = ++newName
            var name = ++newName
            var fieldHTML = '<div class="row"> <div class="col-md-12" id="' + id + '"> <div class="form-group form-group-default  "><input type="text" name="options[' + id + '][title]' + name + '" id="name' + id + '"class="form-control" placeholder="Option Title"/> </div> </div> </div>'
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
    });
});
