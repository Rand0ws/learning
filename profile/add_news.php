<?php include 'layouts/header.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить новость</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/profile/">Главная</a></li>
                        <li class="breadcrumb-item active">Добавить новость</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Добавить новость</h3>
                    </div>
                    
                    <form action="/vendor/news/create.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title" type="text" id="title" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="content">Описание</label>
                                <textarea name="content" id="content" class="form-control" rows="4"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputStatus">Активность</label>
                                <select class="form-control custom-select">
                                    <option value='1'>Опубликовать</option>
                                    <option value='2'>Не опубликовывать</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="img">Загрузить изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="img" type="file" class="custom-file-input" id="img">
                                        <label class="custom-file-label" for="img">Выбрать файл</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Добавить новость</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'layouts/footer.php' ?>