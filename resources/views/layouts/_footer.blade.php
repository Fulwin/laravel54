<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-box footer-logo">
                <a href="{{ route('home') }}" id="logo">
                    <span class="text-atop">ATOP</span>
                    <span class="text-muted">OA</span>
                </a>
            </div>
            <div class="footer-box footer-info">
                <div class="clearfix">
                    <ul class="mb-0 list-unstyled clearfix">
                        <li>
                            <a href="http://www.atoptechnology.com.cn" target="_blank">公司官网</a>
                        </li>
                        <li>
                            <a href="mailto:developer.fulwin@outlook.com">反馈错误</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">关于</a>
                        </li>
                    </ul>
                </div>
                <div class="copyright text-muted">Copyright &copy; 2014 - {{ date('Y') }} ATOP All Right Reserved.</div>
            </div>
        </div>
    </div>
</footer>