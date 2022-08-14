<?php
    //load noi dung cua file layout vao day
    self::$fileLayout = "LayoutView.php";
?>

<form action="<?php echo $action ?>" method="post" role="form">
    <fieldset>
    <legend>Edit user</legend>

    <div class="form-group mt-3 d-flex">
        <label  style="font-size:16px;width:15%" for="">Name</label>
        <input type="text" class="form-control" value="<?php echo isset($record->name)? $record->name:'' ?>" name="name" require placeholder="Input field">
    </div>
    <div class="form-group mt-3 d-flex">
        <label  style="font-size:16px;width:15%" for="">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo isset($record->email)? $record->email:'' ?>" placeholder="Input field" <?php if(isset($record->email)): ?> disabled <?php else: ?> required <?php endif; ?> >
    </div>
    <div class="form-group mt-3 d-flex">
        <label  style="font-size:16px;width:15%" for="">Password</label>
        <input type="password" class="form-control" name="password" id="" <?php if(isset($record->email)):?>  placeholder="Không thay đổi thì không nhập password" <?php else: ?> required <?php endif; ?> >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>


