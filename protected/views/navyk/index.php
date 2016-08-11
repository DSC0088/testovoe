<h1>Навыки</h1>


<div id="navykAddModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Добавление навыка</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('form');?>
            </div>
            <div class="modal-footer">
                <button
                    data-url="<?php echo Yii::app()->createUrl('navyk/create');?>"
                    type="button" class="btn btn-primary navykAddSubmit">Добавить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>





<div id="navykEditModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Правка навыка</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('form');?>
            </div>
            <div class="modal-footer">
                <button
                    data-url="<?php echo Yii::app()->createUrl('navyk/edit');?>"
                    type="button" class="btn btn-primary navykEditSubmit">Сохранить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>


<a class="btn btn-default navykAdd" href="<?php echo Yii::app()->createUrl('navyk/create');?>">
    <span class="glyphicon glyphicon-plus"></span> Добавить
</a>
<br /><br />


<?php if(count($navyk) > 0):?>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>Навык</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($navyk as $k=>$v):?>
            <tr>
                <td><?php echo $k;?></td>
                <td><?php echo $v;?></td>
                <td>
                    <a class="glyphicon glyphicon-pencil navykEdit"
                       data-id="<?php echo $k;?>"
                       data-naz="<?php echo $v;?>"
                    ></a>
                    <a class="glyphicon glyphicon-remove navykDelSubmit"
                       data-id="<?php echo $k;?>"
                       data-url="<?php echo Yii::app()->createUrl('navyk/del');?>"
                    ></a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php else:?>

    <p class="bg-danger">Навыков не найдено</p>
<?php endif;?>
