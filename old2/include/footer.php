    </main>
    
    <footer class="footer bg-warning">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-6">
                    <?= date('Y'); ?> &copy; Корпорация монстров
                </div>
                
                <div class="col-6 text-right">
                    <?= "Счётчик обновления страницы: <b>$visited</b>"; ?>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

<?php

if (isset($db)) {
    $db->close();
}

?>