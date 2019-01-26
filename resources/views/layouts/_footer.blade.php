<footer class="footer">
    <div class="container">
        <div class="clearfix">
            <div class="pull-left">
                <a href="{{ route('home') }}" id="logo">
                    <span class="text-atop">ATOP</span>
                    <span class="text-muted">OA</span>
                </a>
            </div>
            <div class="pull-right">
                <nav>
                    <ul class="mb-0">
                        <li><a href="http://www.atoptechnology.com.cn" target="_blank">公司官网</a></li>
                        <li><a href="mailto:developer.fulwin@outlook.com">反馈错误</a></li>
                        <li><a href="{{ route('about') }}">关于</a></li>
                    </ul>
                </nav>
                <small class="text-muted">Copyright &copy; 2014 - {{ date('Y') }} ATOP All Rights Resvered.</small>
            </div>
        </div>
    </div>
</footer>