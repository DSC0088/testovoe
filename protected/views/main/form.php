<form  role="form" >

    <input class="id" type="hidden" />

    <div class="form-group">
        <label>
            Фамилия
            <input class="familia" type="text" class="form-control" />
        </label>
    </div>

    <div class="form-group">
        <label>
            Навыки
            <?php echo CHtml::dropDownList('navyki', '', $navyk_list, array('class'=>'navyki form-control', 'multiple' => 'multiple')); ?>
        </label>
    </div>


    <div class="form-group">
        <label>
            Группы
            <?php echo CHtml::dropDownList('gruppy', '', $gruppa_list, array('class'=>'gruppy form-control', 'multiple' => 'multiple')); ?>
        </label>
    </div>

    <div class="checkbox">
        <label><input class="nameste" type="checkbox"> На месте</label>
    </div>



</form>