<h1><?=$title ?></h1>

<?php
if(get_cookie('type') === 'admin') {?>
    <div class="btn-group btn-group-lg">
        <a class="btn btn-primary" href = '<?php echo base_url()  ?>index.php/Classes/create' >New Class</a>
    </div>
<?php } ?>
<?php
$tr_class = array(
'success',
'danger',
'info'
);
?>
<table class ='table'>
    <tbody>
<?php
$i=0;
foreach($classes as $columns){
    ?>  <tr class="<?php echo $tr_class[$i % 3] ?>">
        <td><?=$columns['class_name']?></td>
        <?php if(get_cookie('type') === 'admin'){?>
            <td><a href = "<?=base_url()?>index.php/Classes/delete_classes/<?php echo $columns['class_id'] ?>"><?=$delete?></span></a></td>
            <td><a href = '<?=base_url(); ?>index.php/Classes/update/<?=$columns['id'];?>' ><?=$update?></a></td>
        <?php } ?>
    </tr> <?php
    $i++;
}
?>
    </tbody>
</table>

