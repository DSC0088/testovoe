
<div id="sotrydnikAddModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Добавление сотрудника</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('form', array(
                    'navyk_list' => $navyk_list,
                    'gruppa_list' => $gruppa_list,
                ));?>
            </div>
            <div class="modal-footer">
                <button
                    data-url="<?php echo Yii::app()->createUrl('main/create');?>"
                    type="button" class="btn btn-primary sotrydnikAddSubmit">Добавить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>







<div id="sotrydnikEditModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Редактирование сотрудника</h4>
            </div>
            <div class="modal-body">

                <?php $this->renderPartial('form', array(
                    'navyk_list' => $navyk_list,
                    'gruppa_list' => $gruppa_list,
                ));?>


            </div>
            <div class="modal-footer">
                <button
                    data-url="<?php echo Yii::app()->createUrl('main/edit');?>"
                    type="button" class="btn btn-danger sotrydnikEditSubmit" >Сохранить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>







<h1>Сотрудники</h1>

<a class="btn btn-default sotrydnikAdd" href="<?php echo Yii::app()->createUrl('main/create');?>">
    <span class="glyphicon glyphicon-plus"></span> Добавить
</a>
<br /><br />



<form class="form-inline" role="form" action="" method="get">

    <div class="form-group">
        <label>
            Группа
            <?php echo CHtml::dropDownList('gruppa_dropdown', $gruppa_sel, array_merge(array(Gruppa::ID_NOSELECT => '-'), $gruppa_list), array('class'=>'form-control')); ?>
        </label>
    </div>

    <div class="form-group">
        <label>
            Навык
            <?php echo CHtml::dropDownList('navyk_dropdown', $navyk_sel, array_merge(array(Navyk::ID_NOSELECT => '-'), $navyk_list), array('class'=>'form-control')); ?>
        </label>
    </div>

    <div class="form-group">
        <label>
            На месте
            <?php echo CHtml::dropDownList('nameste_dropdown', $nameste_sel, array_merge(array(Sotrydnik::NAMESTE_NOSELECT => '-'), $nameste_list), array('class'=>'form-control')); ?>
        </label>
    </div>


    <div>
        <button type="submit" class="btn btn-danger">Поиск</button>
        <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('/');?>">Сброс</a>
    </div>

</form>

<br />






<?php if(count($sotrydnik) > 0):?>
    <table class="table">
        <thead>
        <tr>
            <th>Фамилия</th>
            <th>Навыки</th>
            <th>Группы</th>
            <th>На месте</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($sotrydnik as $k=>$v):?>
            <tr>
                <th><?php echo $v['familia'];?></th>
                <td>
                    <?php foreach($v['navyk_arr'] as $navyk):?>
                        <span class="label label-info"><?php echo $navyk_list[$navyk];?></span>
                    <?php endforeach;?>
                </td>
                <td>
                    <?php foreach($v['gruppa_arr'] as $gruppa):?>
                        <span class="label label-info"><?php echo $gruppa_list[$gruppa];?></span>
                    <?php endforeach;?>
                </td>
                <td>
                    <?php if ($v['nameste']==='n'):?>
                        <span class="label label-danger">Нет</span>
                    <?php elseif ($v['nameste']==='y') :?>
                        <span class="label label-success">Да</span>
                    <?php endif;?>
                </td>
                <td>
                    <a class="glyphicon glyphicon-pencil sotrydnikEdit"
                       data-id="<?php echo $v['id'];?>"
                       data-all="<?php echo htmlspecialchars(json_encode($v));?>"
                        ></a>
                    <a class="glyphicon glyphicon-remove sotrydnikDelSubmit"
                       data-id="<?php echo $v['id'];?>"
                       data-url="<?php echo Yii::app()->createUrl('main/del');?>"
                    ></a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php else:?>

    <p class="bg-danger">Сотрудников не найдено</p>
<?php endif;?>


