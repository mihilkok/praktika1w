<br><br>
<div class="container col-4">
<?php if (isset($_SESSION['login'])) {?>

  <form method="post" action="/news/addPage/">
    <table>
      <tr>
        <td>
          <h4>Добро пожаловать <?= $_SESSION['login']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
        </td>
        <td>
          <input type="submit" class="form-control btn btn-dark" name="add"  value="Добавить новость">
        </td>
      </tr>
    </table>
  </form>
<?php } else {?>
  <h5>Чтобы добавлять записи и оставлять комментарии нужно <a href="/User/index">авторизироваться</a> или <a href="/User/registrationPage">зарегистрироваться</a></h5></p>
<?php } ?>
</div>
<hr>
<?php foreach ($data as $row){?>

  <div class="container" style = "border:solid #333A40 1px; border-radius: 10px; padding:18px;">
    <a style = "color:black; text-decoration: none;" href="/news/Page/?
      id=<?= $row['id'];?>
      &title=<?= $row['title'];?>
      &data=<?= $row['date'];?>
      &author=<?= $row['author'];?>
      &text=<?= $row['text'];?>">

        <h4> <?= $row['title'];?></h4>
        <h6> <?= $row['date']; ?></h6>
          <?php
          if (isset($_SESSION['login'])) {
          if ($_SESSION['login'] == $row['author'] || isset($_SESSION['isAdmin']) == true) {?>
            <table>
            <tr>
              <td>
                <a class="form-control btn btn-dark" href="/news/editPage/?id=<?= $row['id'];?>&title=<?= $row['title'];?>
                  &author=<?= $row['author']; ?>&text=<?= $row['text'];?>">редактировать</a>
              </td>
              <td>
                <a class="form-control btn btn-danger" href="/news/delete/?id=<?= $row['id'];?>&author=<?= $row['author']; ?>">Удалить</a>
              </td>
            </tr>
          </table>
        <?php } }?>
      <hr>
      <div class=""><?= $row['text'];?></div><hr>
      <div class=""><h6><?= $row['author'];?></h6></div>
      </a>
  </div>

  <br>
<?php } ?>
