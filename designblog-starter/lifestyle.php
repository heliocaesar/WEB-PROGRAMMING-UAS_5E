<?php
// Menghubungkan ke database
include './lib/koneksi.php';

$sqlTrending = "
    SELECT 
        p.ID_POST, 
        p.KATEGORI, 
        p.JUDUL, 
        p.GAMBAR, 
        p.ISI, 
        a.NAMA_AUTHOR,  
        p.BIDANG, 
        p.TANGGAL, 
        p.DILIHAT 
    FROM 
        postingan p 
    JOIN 
        author a ON p.ID_AUTHOR = a.ID_AUTHOR
    WHERE 
        p.KATEGORI = 'Pendidikan'
    ORDER BY 
        p.DILIHAT DESC
    LIMIT 1
";
$result = $conn->query($sqlTrending);

// ====================

$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;  // Default 5 post per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query untuk menghitung total postingan
$totalQuery = "SELECT COUNT(*) as total FROM postingan";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalPosts = $totalRow['total'];

// Menghitung total halaman
$totalPages = ceil($totalPosts / $limit);

// Query untuk mengambil data dari tabel postingan dengan join ke tabel author
$sql = "
    SELECT 
        p.ID_POST, 
        p.KATEGORI, 
        p.JUDUL, 
        p.GAMBAR, 
        p.ISI, 
        a.NAMA_AUTHOR,  
        p.BIDANG, 
        p.TANGGAL, 
        p.DILIHAT 
    FROM 
        postingan p 
    JOIN 
        author a ON p.ID_AUTHOR = a.ID_AUTHOR
    WHERE 
        p.KATEGORI = 'Pendidikan'
    ORDER BY 
        p.DILIHAT DESC
    LIMIT $limit OFFSET $offset
";

$result2 = $conn->query($sql);

$sqlTrending = "
    SELECT 
        p.ID_POST, 
        p.KATEGORI, 
        p.JUDUL, 
        p.GAMBAR, 
        p.ISI, 
        a.NAMA_AUTHOR,  
        p.BIDANG, 
        p.TANGGAL, 
        p.DILIHAT 
    FROM 
        postingan p 
    JOIN 
        author a ON p.ID_AUTHOR = a.ID_AUTHOR
    WHERE 
        p.KATEGORI = 'Pendidikan'
    ORDER BY 
        p.DILIHAT DESC
    LIMIT 3
";
$resultTrending = $conn->query($sqlTrending);


?>




<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Web Programming - Final Semester Exam</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!-- header -->
    <header class="w3l-header">
        <!--/nav-->
        <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <span class="fa fa-pencil-square-o"></span> Design Blog</a>
                <!-- if logo is image enable this   
						<a class="navbar-brand" href="#index.html">
							<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
						</a> -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<!-- <span class="navbar-toggler-icon"></span> -->
				<span class="fa icon-expand fa-bars"></span>
				<span class="fa icon-close fa-times"></span>
			</button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item @@home__active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Categories <span class="fa fa-angle-down"></span>
						</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item @@cp__active" href="technology.php">Teknologi</a>
                                <a class="dropdown-item active" href="lifestyle.php">Pendidikan</a>
                            </div>
                        </li>
                        <li class="nav-item @@contact__active">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href="dashboard/post.php">Dashboard</a>
                        </li>
                    </ul>

                    <!--/search-right-->
                    <div class="search-right mt-lg-0 mt-2">
                        <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                        <!-- search popup -->
                        <div id="search" class="pop-overlay">
                            <div class="popup">
                                <h3 class="hny-title two">Search here</h3>
                                <form action="#" method="Get" class="search-box">
                                    <input type="search" placeholder="Search for blog posts" name="search" required="required" autofocus="">
                                    <button type="submit" class="btn">Search</button>
                                </form>
                                <a class="close" href="#close">×</a>
                            </div>
                        </div>
                        <!-- /search popup -->
                    </div>
                    <!--//search-right-->
                    <!-- author -->
                    <!-- <div class="header-author d-flex ml-lg-4 pl-2 mt-lg-0 mt-3">
                        <a class="img-circle img-circle-sm" href="#author">
                            <img src="assets/images/author.jpg" class="img-fluid" alt="...">
                        </a>
                        <div class="align-self ml-3">
                            <a href="#author">
                                <h5>Alexander</h5>
                            </a>
                            <span>Blog Writer</span>
                        </div>
                    </div> -->
                    <!-- // author-->

                </div>

                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </div>
        </nav>
        <!--//nav-->
    </header>
    <!-- //header -->

    <nav id="breadcrumbs" class="breadcrumbs">
        <div class="container page-wrapper">
            <a href="index.html">Home</a> / Categories /<span class="breadcrumb_last" aria-current="page">Pendidikan</span>
        </div>
    </nav>
    <div class="w3l-searchblock w3l-homeblock1 py-5">
        <div class="container py-lg-4 py-md-3">
            <!-- block -->
            <div class="row">
                <div class="col-lg-8 most-recent">
                    <h3 class="section-title-left">Pendidikan</h3>

                    <div class="row">
                        <div class="col-md-12 item">
                            <div class="card">
<!-- ARRAYYYYYYYYYYYYYY================================================= -->
<?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <div class="card-header p-0 position-relative">
                                    <a href="#blog-single">
                                        <img class="card-img-bottom d-block radius-image" src="assets/images/<?php echo htmlspecialchars($row['GAMBAR']); ?>" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body p-0 blog-details">
                                    <a href="#blog-single" class="blog-desc">
                                    <?php echo htmlspecialchars($row['JUDUL']); ?>
                                </a>
                                    <p>
                                    <?php echo htmlspecialchars($row['ISI']); ?>
                                    </p>
                                    <div class="author align-items-center mt-3 mb-1">
                                        <a href="#author">
                                        <?php echo htmlspecialchars($row['NAMA_AUTHOR']); ?>
                                        </a> in <a href="#url">
                                        <?php echo htmlspecialchars($row['BIDANG']); ?>
                                        </a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li class="meta-item blog-lesson">
                                            <span class="meta-value">
                                            <?php echo htmlspecialchars($row['TANGGAL']); ?>
                                                </span>
                                        </li>
                                        <li class="meta-item blog-students">
                                            <span class="meta-value">
                                            Dilihit oleh <?php echo htmlspecialchars($row['DILIHAT']); ?> orang
                                                </span>
                                        </li>
                                    </ul>
<?php endwhile; ?>

                                </div>

<!-- ARRAYYYYYYYYYYYYYY================================================= -->


                            </div>
                            
                        </div>
                        <?php while ($row = mysqli_fetch_assoc($result2)): ?>
                        <!-- =======================ARRRAY ANAKAN================================== -->

                        
                        <div class="col-lg-6 col-md-6 item mt-5 pt-lg-3">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <a href="#blog-single">
                                        <img class="card-img-bottom d-block radius-image" src="assets/images/<?php echo htmlspecialchars($row['GAMBAR']); ?>" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body p-0 blog-details">
                                    <a href="#blog-single" class="blog-desc">
                                    <?php echo htmlspecialchars($row['JUDUL']); ?>
                                </a>
                                    <p>
                                    <?php echo htmlspecialchars($row['ISI']); ?>
                                    </p>
                                    <div class="author align-items-center mt-3 mb-1">
                                        <a href="#author">
                                        <?php echo htmlspecialchars($row['NAMA_AUTHOR']); ?>
                                        </a> in <a href="#url">
                                        <?php echo htmlspecialchars($row['BIDANG']); ?>
                                        </a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li class="meta-item blog-lesson">
                                            <span class="meta-value"> 
                                            <?php echo htmlspecialchars($row['TANGGAL']); ?>
                                        </span>
                                        </li>
                                        <li class="meta-item blog-students">
                                            <span class="meta-value"> 
                                            Dilihat oleh <?php echo htmlspecialchars($row['DILIHAT']); ?> orang
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
<?php endwhile; ?>
                    </div>
                    
                    <!-- pagination -->
                    <div class="pagination-wrapper mt-5">
                            <ul class="page-pagination">
                                <?php if($page > 1): ?>
                                <li><a class="next" href="?page=<?php echo $page - 1; ?>"><span class="fa fa-angle-left"></span></a></li>
                                <?php endif; ?>
                                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                                <?php if($i <= 10): ?>
                                <li>
                                    <a class="page-numbers <?php echo ($i == $page) ? 'current' : ''; ?>" href="?page=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                                <?php elseif($i == 11): ?>
                                <li><span>....</span></li>
                                <li>
                                    <a class="page-numbers" href="?page=<?php echo $totalPages; ?>">
                                        <?php echo $totalPages; ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php endfor; ?>
                                <?php if($page < $totalPages): ?>
                                <li><a class="next" href="?page=<?php echo $page + 1; ?>"><span class="fa fa-angle-right"></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <!-- //pagination -->
                </div>
                <div class="col-lg-4 trending mt-lg-0 mt-5 mb-lg-5">
                    <div class="pos-sticky">
                        <h3 class="section-title-left">Trending </h3>
                        <?php $counter = 1; while ($row = mysqli_fetch_assoc($resultTrending)): ?>
                            <div class="grids5-info">
                                <h4>
                                    <?php echo sprintf('%02d', $counter++); ?>.</h4>
                                <div class="blog-info">
                                    <a href="#blog-single" class="blog-desc1">
                                        <?php echo htmlspecialchars($row['JUDUL']); ?>
                                    </a>
                                    <div class="author align-items-center mt-2 mb-1">
                                        <a href="#author">
                                            <?php echo htmlspecialchars($row['NAMA_AUTHOR']); ?>
                                        </a> in
                                        <a href="#url">
                                            <?php echo htmlspecialchars($row['BIDANG']); ?>
                                        </a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li class="meta-item blog-lesson"><span class="meta-value"><?php echo $row['TANGGAL']; ?></span></li>
                                        <li class="meta-item blog-lesson"><span class="meta-value">Dilihat : <?php echo $row['DILIHAT']; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <!-- //block-->

            <!-- ad block -->
            <div class="ad-block text-center mt-5">
                <a href="#url"><img src="assets/images/ad.gif" class="img-fluid" alt="ad image" /></a>
            </div>
            <!-- //ad block -->
        </div>
    </div>

    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="footer-content py-lg-5 py-4 text-center">
            <div class="container">
                <div class="copy-right">
                    <h6>© 2020 Design Blog . Made with <span class="fa fa-heart" aria-hidden="true"></span>, Designed by <a href="https://w3layouts.com">W3layouts</a> </h6>
                </div>
                <ul class="author-icons mt-4">
                    <li><a class="facebook" href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a> </li>
                    <li><a class="twitter" href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                    <li><a class="google" href="#url"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>
                    <li><a class="linkedin" href="#url"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                    <li><a class="github" href="#url"><span class="fa fa-github" aria-hidden="true"></span></a></li>
                    <li><a class="dribbble" href="#url"><span class="fa fa-dribbble" aria-hidden="true"></span></a></li>
                </ul>
                <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
      </button>
            </div>
        </div>

        <!-- move top -->
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- //move top -->
    </footer>
    <!-- //footer -->

    <!-- Template JavaScript -->
    <script src="assets/js/theme-change.js"></script>

    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>