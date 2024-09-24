<style>
    a{
        text-decoration: none;
    }
    .to-top{
        margin:2em;
        font-size: 16px;
        font-family: Calibri, arial, sans-serif;
        text-align:center;
        color:black;
        padding-top:1.8em;
        display:inline-block;/* or block */
        position:relative;
        border-color:black;
        text-decoration:none;
        transition:all .3s ease-out;
    }
    .to-top:before{
        content:'▲';
        font-size:.9em;
        position:absolute;
        top:0;
        left:50%;
        margin-left:-.7em;
        border:solid .13em black;
        border-radius:10em;
        width:1.4em;
        height:1.4em;
        line-height:1.3em;
        border-color:inherit;
        transition:transform .5s ease-in;
    }
    .to-top:hover{
        color:#47647d;
        border-color:#47647d;
    }
    .to-top:hover:before{
        transform: rotate(360deg);
    }
</style>

<footer class="text-body-secondary py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#" class="to-top">Back to top</a>
        </p>
        <p class="mt-2">phone 021-727 0086 Ext. 126</p>
        <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
            <a href="#">Help Desk Pancasila University</a>.
        </p>
        <div class="mt-4">
            <ul class="social-icons">
                <li><a class="facebook" href="https://www.facebook.com/universitaspancasila"><i class="bi bi-facebook"></i></a></li>
                <li><a class="twitter" href="https://twitter.com/UnivPancasila?s=20"><i class="bi bi-twitter"></i></a></li>
                <li><a class="instagram" href="https://www.instagram.com/universitaspancasila/"><i class="bi bi-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
