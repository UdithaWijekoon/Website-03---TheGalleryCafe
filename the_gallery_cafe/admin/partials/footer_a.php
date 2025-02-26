<style>

footer {
    background-color: #292828;
    color: #fff;
    padding: 40px 0;
    border-top: 3px solid #ffbd42;
    animation: slideInBottom 1s ease-in-out;
}
/* animation for footer */
@keyframes slideInBottom {
    from {
        transform: translateY(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.footer-content {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.footer-section {
    flex: 1 1 300px;
    margin: 20px;
}

.footer-section h3 {
    border-bottom: 2px solid #ffbd42;
    color: #ffbd42;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.footer-section p, .footer-section ul {
    margin: 0;
    padding: 0;
    list-style: none;
    line-height: 1.8;
}

.footer-section a {
    color: #fff;
    text-decoration: none;
}

.footer-section a:hover {
    color: #ffbd42;
}

.footer-bottom {
    text-align: center;
    color: #ffbd42;
    padding-top: 20px;
    border-top: 1px solid #444;
    margin-top: 20px;
}
.logo{
    display: flex;
    justify-content: center;
}

</style>

<footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h3>The Gallery Cafe</h3>
            <p>The Gallery Cafe offers a unique dining experience with a blend of exquisite cuisine and a charming atmosphere. Join us to enjoy our special meals, events, and promotions.</p>
        </div>
        <div class="footer-section logo">
        <img src="../images/logo.png" alt="Cafe Logo" class="footer-logo" style="width: 150px; height: auto;"> 
        </div>
        <div class="footer-section contact">
            <h3>Admin Dashboard</h3>
            <p>Location: 12/24 D.S.Senanayake Street, Colombo, Sri Lanka</p>
            <p>Phone: +94 11 2345678</p>
            <p>Email: info@thegallerycafe.com</p>
        </div>
      </div>
    <div class="footer-bottom">
        <p>The Gallery Cafe</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if (isset($_GET['message'])): ?>
            var message = "<?php echo $_GET['message']; ?>";
            var messageModal = new bootstrap.Modal(document.getElementById('messageModal'), {});
            document.getElementById('messageContent').innerText = message;
            messageModal.show();
        <?php endif; ?>
    </script>

</body>
</html>