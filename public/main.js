
var Navyk = function() {
    this.init = function(){
        $(".navykAdd").click(navykAdd);
        $(".navykAddSubmit").click(navykAddSubmit);

        $(".navykEdit").click(navykEdit);
        $(".navykEditSubmit").click(navykEditSubmit);


        $(".navykDelSubmit").click(navykDelSubmit);
    }

    var navykAdd = function(){

        $("#navykAddModal").modal();
        return false;
    }

    var navykAddSubmit = function(){
        var $this = $(this);

        $.ajax({
            url: $this.attr('data-url'),
            data: {naz: $('#navykAddModal .naz').val()},
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){

            }
        });
    }

    var navykEdit = function(){

        var $this = $(this);

        $('#navykEditModal .naz').val($this.attr('data-naz'));
        $('#navykEditModal .id').val($this.attr('data-id'));

        $("#navykEditModal").modal();
        return false;
    }

    var navykEditSubmit = function(){
        var $this = $(this);
        //alert($('#navykEditModal .naz').val());


        $.ajax({
            url: $this.attr('data-url'),
            data: {
                naz: $('#navykEditModal .naz').val(),
                id: $('#navykEditModal .id').val()
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){

            }
        });
    }



    var navykDelSubmit = function(){
        var $this = $(this);

        $.ajax({
            url: $this.attr('data-url'),
            data: {
                id: $this.attr('data-id')
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){
                console.log(data);

            }
        });
    }
}



var Gruppa = function() {
    this.init = function(){
        $(".gruppaAdd").click(gruppaAdd);
        $(".gruppaAddSubmit").click(gruppaAddSubmit);

        $(".gruppaEdit").click(gruppaEdit);
        $(".gruppaEditSubmit").click(gruppaEditSubmit);


        $(".gruppaDelSubmit").click(gruppaDelSubmit);
    }

    var gruppaAdd = function(){

        $("#gruppaAddModal").modal();
        return false;
    }

    var gruppaAddSubmit = function(){
        var $this = $(this);

        $.ajax({
            url: $this.attr('data-url'),
            data: {naz: $('#gruppaAddModal .naz').val()},
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){

            }
        });
    }

    var gruppaEdit = function(){

        var $this = $(this);

        $('#gruppaEditModal .naz').val($this.attr('data-naz'));
        $('#gruppaEditModal .id').val($this.attr('data-id'));

        $("#gruppaEditModal").modal();
        return false;
    }

    var gruppaEditSubmit = function(){
        var $this = $(this);
        //alert($('#gruppaEditModal .naz').val());


        $.ajax({
            url: $this.attr('data-url'),
            data: {
                naz: $('#gruppaEditModal .naz').val(),
                id: $('#gruppaEditModal .id').val()
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){

            }
        });
    }



    var gruppaDelSubmit = function(){
        var $this = $(this);

        $.ajax({
            url: $this.attr('data-url'),
            data: {
                id: $this.attr('data-id')
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){
                console.log(data);

            }
        });
    }
}



var Sotrydnik = function(){

    this.init = function(){
        $('#sotrydnikAddModal .navyki').multiselect();
        $('#sotrydnikAddModal .gruppy').multiselect();
        $(".sotrydnikAdd").click(sotrydnikAdd);
        $(".sotrydnikAddSubmit").click(sotrydnikAddSubmit);


        $('#sotrydnikEditModal .navyki').multiselect();
        $('#sotrydnikEditModal .gruppy').multiselect();
        $(".sotrydnikEdit").click(sotrydnikEdit);
        $(".sotrydnikEditSubmit").click(sotrydnikEditSubmit);

        $(".sotrydnikDelSubmit").click(sotrydnikDelSubmit);
    }


    var sotrydnikAdd = function(){
        $("#sotrydnikAddModal").modal();
        return false;
    }


    var sotrydnikAddSubmit = function(){

        var $this = $(this);


        $.ajax({
            url: $this.attr('data-url'),
            data: {
                //id: $this.attr('data-id')
                familia: $('#sotrydnikAddModal .familia').val(),
                navyki: $('#sotrydnikAddModal .navyki').val(),
                gruppy: $('#sotrydnikAddModal .gruppy').val(),
                nameste: $('#sotrydnikAddModal .nameste').is(':checked') ? 1: 0

            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){
                console.log(data);
            }
        });




    }

    var sotrydnikDelSubmit = function(){

        var $this = $(this);
        $.ajax({
            url: $this.attr('data-url'),
            data: {
                id: $this.attr('data-id')
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){
                console.log(data);
            }
        });
    }


    var sotrydnikEdit = function(){
        var $this = $(this);
        var data_all = JSON.parse($this.attr('data-all'));


        //console.log(data_all);

        $('#sotrydnikEditModal').modal();


        $('#sotrydnikEditModal .navyki option').prop("selected", false);
        $('#sotrydnikEditModal .gruppy option').prop("selected", false);



        // Заполнения
        $('#sotrydnikEditModal .id').val(data_all.id);
        $('#sotrydnikEditModal .familia').val(data_all.familia);

        $('#sotrydnikEditModal .navyki option').each(function(){
            if (data_all.navyk_arr.indexOf($(this).val()) != -1)
                $(this).prop("selected", true);
        });
        $('#sotrydnikEditModal .navyki').multiselect('refresh');

        $('#sotrydnikEditModal .gruppy option').each(function(){
            if (data_all.gruppa_arr.indexOf($(this).val()) != -1)
                $(this).prop("selected", true);
        });
        $('#sotrydnikEditModal .gruppy').multiselect('refresh');

        if (data_all.nameste=='y')
            $('#sotrydnikEditModal .nameste').attr("checked", "checked");
        else if (data_all.nameste=='n')
            $('#sotrydnikEditModal .nameste').removeAttr("checked");
    }

    var sotrydnikEditSubmit= function(){

        var $this = $(this);

        $.ajax({
            url: $this.attr('data-url'),
            data: {
                id: $('#sotrydnikEditModal .id').val(),
                familia: $('#sotrydnikEditModal .familia').val(),
                navyki: $('#sotrydnikEditModal .navyki').val(),
                gruppy: $('#sotrydnikEditModal .gruppy').val(),
                nameste: $('#sotrydnikEditModal .nameste').is(':checked') ? 1: 0
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                var err = parseInt(data.err);
                alert(data.msg);
                if (err==0) location.reload();
            },
            error: function(data){
                //console.log(data);
            }
        });
    }


}


jQuery(document).ready(function () {
    (new Navyk).init();
    (new Gruppa).init();
    (new Sotrydnik).init();
});


