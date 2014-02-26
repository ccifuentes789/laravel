<?php
    if(Session::has('success')) :?>
        <p style="color: green;">
            <?php echo Session::get('success');?>
        </p>
<?php endif?>

<?php //var_dump($errors->all()); ?>
<form action="<?php echo url('dvds') ?>" method="post">

    Title: <input type="text" name="title" value="<?php echo Input::old('title') ?>">
    <br />
    Genre:
    <select name="genre">

    <?php foreach ($genres as $genre) : ?>
        <option value = "<?php echo $genre->id?>">
            <?php echo $genre->genre_name?>
        </option>
    <?php endforeach;?>
    </select>


    <br />
   
    <input type="submit" value="Create Song">



</form>