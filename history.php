
<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    $qry_item = mysqli_query($conn, "SELECT * FROM item WHERE id_item = ".$item_id);
    $qry_history = mysqli_query($conn, "SELECT * FROM history WHERE id_item = ".$item_id);
    $dt_item = mysqli_fetch_array($qry_item);
    $dt_history = mysqli_fetch_array($qry_history);
        ?>
        <div class="smh col-md-3">
            <div class="card">
            <img src="display_image.php?image_id=<?php echo $dt_item['id']; ?>" class="rounded w-100" />
                <div class="card-body">
                    <h2 class="card-title">
                        <?= $dt_history['id_winner'] ?>
                    </h2>
                    <h5 class="card-title">
                        <?= $dt_history['winner'] ?>
                    </h5>
                    <p class="card-text">
                        <?= substr($dt_history['final_bid'], 0, 20) ?>
                    </p>
                    <!-- <a href="bidding.php?id=<?= $dt_item['id'] ?>" class="btn btn-primary w-100">Bid here</a> -->
                </div>
            </div>
        </div>
        <?php
}
?>

