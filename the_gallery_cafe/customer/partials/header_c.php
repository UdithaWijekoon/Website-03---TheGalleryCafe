<style>
/* Header */
.custom-navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px;
    background: transparent;
    flex-wrap: wrap;
}

.custom-logo {
    width: 180px;
    height: auto;
}

.custom-logo img {
    width: 100%;
    height: auto;
    transition: transform 0.3s;
}

.custom-logo img:hover {
    transform: scale(1.1);
}

.custom-nav-items {
    display: flex;
    list-style: none;
    flex-wrap: wrap;
}

.custom-nav-link {
    position: relative;
    text-decoration: none;
    color: #ffbd42;
    margin: 0px 15px;
    display: inline-block;
    font-size: 18px;
    transition: color 0.3s;
}

.custom-nav-link:hover,
.custom-nav-link.active {
    color: #fff;
}

.custom-nav-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background-color: #ffbd42;
    border-radius: 40px;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.3s;
}

.custom-nav-link:hover::after,
.custom-nav-link.active::after {
    transform-origin: left;
    transform: scaleX(1);
}

.custom-nav-button {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    padding: 15px 35px;
    text-decoration: none;
    transition: 0.5s;
    font-size: 15px;
    overflow: hidden;
    display: inline-block;
    position: relative;
    color: #ffbd42;
    background-color: transparent;
    font-size: 20px;
    border: none;
    cursor: pointer;
}

.custom-nav-button:hover {
    background: #ffbd42;
    color: #000;
    box-shadow: 
        0 0 5px #ffbd42,
        0 0 5px #ffbd42,
        0 0 5px #ffbd42,
        0 0 5px #ffbd42;
    -webkit-box-reflect: below 1px linear-gradient(transparent, rgb(0, 0, 0));
}

.custom-nav-button span {
    position: absolute;
    display: block;
}

.custom-nav-button span:nth-child(1) {
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #ffbd42);
    animation: btn1 1s linear infinite;
}

@keyframes btn1 {
    0% {
        left: -100%;
    }
    50%, 100% {
        left: 100%;
    }
}

.custom-nav-button span:nth-child(2) {
    top: -100;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #ffbd42);
    animation: btn2 1s linear infinite;
    animation-delay: -0.75s;
}

@keyframes btn2 {
    0% {
        top: -100%;
    }
    50%, 100% {
        top: 100%;
    }
}

.custom-nav-button span:nth-child(3) {
    bottom: 0;
    right: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(180deg, transparent, #ffbd42);
    animation: btn3 1s linear infinite;
    animation-delay: -0.50s;
}

@keyframes btn3 {
    0% {
        right: -100%;
    }
    50%, 100% {
        right: 100%;
    }
}

.custom-nav-button span:nth-child(4) {
    top: -100;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #ffbd42);
    animation: btn4 1s linear infinite;
    animation-delay: -0.25s;
}

@keyframes btn4 {
    0% {
        bottom: -100%;
    }
    50%, 100% {
        bottom: 100%;
    }
}
/* Responsive Styles */
@media (max-width: 768px) {
    .custom-navbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .custom-nav-items {
        flex-direction: column;
        width: 50%;
    }

    .custom-nav-link {
        margin: 10px 0;
        text-align: left;
    }

    .custom-nav-button {
        width: 100%;
        text-align: left;
    }
}

@media (max-width: 480px) {
    .custom-logo {
        width: 150px;
    }

    .custom-nav-link {
        font-size: 16px;
    }

    .custom-nav-button {
        font-size: 18px;
        padding: 10px 20px;
    }
}
</style>

<header>
    <nav class="custom-navbar">
        <div class="custom-logo">
            <a href="customer_dashboard.php"><img src="../images/logo.png" alt="logo"></a>
        </div>
        <ul class="custom-nav-items">
            <li><a href="customer_dashboard.php" class="custom-nav-link">Home</a></li>
            <li><a href="reservation.php" class="custom-nav-link">Reservation</a></li>
            <li><a href="contact_us.php" class="custom-nav-link">Contact Us</a></li>
            <li><a href="pre_order.php" class="custom-nav-link">Pre-Order</a></li>
            <li><a href="tables.php" class="custom-nav-link">Tables</a></li>
            <li><a href="parking_availability.php" class="custom-nav-link">Parking</a></li>
            <li><a href="promotion.php" class="custom-nav-link">Events</a></li>
            <li><a href="customer_reviews.php" class="custom-nav-link">Review</a></li>
            <li><a href="logout.php"><button class="custom-nav-link custom-nav-button">           
                <span></span>
                <span></span>
                <span></span>
                <span></span>Log Out
            </button></a></li>
        </ul>
    </nav>
</header>

<script>
    // Highlight the current page
    document.querySelectorAll('.custom-nav-link').forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });
</script>

