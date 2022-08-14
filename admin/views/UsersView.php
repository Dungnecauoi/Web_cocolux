<?php
  self::$fileLayout = "LayoutView.php";
?>
<div class="content">
  <div class="col-md-12">
      <a href="index.php?controller=users&action=create" style="width:15%"  class="btn text-white mb-3 btn-large btn-primary btn-block btn-default">Thêm</a>
      
      <table class="table table-bordered w-100 table-hover">
        <thead>
          <tr>
            <th class="w-30">NAME</th>
            <th>EMAIL</th>
            <th style="width:100px">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $rows): ?>
          <tr>
            <td><?php echo $rows->name ?></td>
            <td><?php echo $rows->email ?></td>
            <td ><a href="index.php?controller=users&action=update&id=<?php echo $rows->id ?>" class="text-black mr-2 text-decoration-none hover"> Sửa</a><a href="index.php?controller=users&action=delete&id=<?php echo $rows->id ?>" class="text-black text-decoration-none" onclick=" return window.confirm('Bạn có chắc chắn muốn xoá không')" > Xoá</a></td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>  
         
        
        <ul class="pagination pagination-sm">
          <li><a class="page-link" href="#">Trang</a></li>
          <?php for($i=1;$i<=$numPage;$i++):?> 
          <li><a  class="page-link" href="index.php?controller=users&p=<?php echo $i?>"><?php echo $i ?></a></li>
          <?php endfor; ?>
        </ul>
        
     
  </div>
</div>

<div  class="a" id="b"></div>


