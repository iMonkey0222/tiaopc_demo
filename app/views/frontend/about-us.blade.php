
@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
About Us
@parent
@stop


@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h3>关于我们</h3>
        <span></span>
        <ol class="breadcrumb">
            <li><a class="icon-home" href="#">主页</a></li>
            <li class="active icon-user">关于我们</li>
        </ol>
    </div>

</section>
@stop

{{-- Page content --}}
@section('content')
<section id="content">

    <div class="content-wrap">


        <div class="container clearfix">

            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>更新日志</span></h2>
            </div>

            <div class="accordion accordion-bg clearfix">
                <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>TiaoPC V1.0</div>

                <div class="acc_content clearfix" style="display: none;">
                    <!-- Product Single - Meta
                    ============================================= -->
                    <div class="panel panel-default product-meta">
                        <div class="panel-body">
                            <span>2015-3-20      第一版上线</span>
                        </div>
                    </div><!-- Product Single - Meta End -->
                </div>


                <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>TiaoPC V2.0 </div>

                <div class="acc_content clearfix" style="display: none;">
                    <!-- Product Single - Meta
                    ============================================= -->
                    <div class="panel panel-default product-meta">
                        <div class="panel-body">
                            <span>2015-5-5         第二版完成，添加快速注册，重做物品分类，统一网站语言，增加价格走势图，开放西交利物浦邮箱注册，修改了前一版本bug</span>
                        </div>
                    </div><!-- Product Single - Meta End -->
                </div>
                
            </div>            


            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>What is TiaoPC ?</span></h2>
            </div>
            <div class="heading-block center nobottomborder">
                <h2></h2>
                <span><strong>Tiaopc</strong>是一个闲置数码产品信息的交流平台，我们致力于让交易过程变得更加自由灵活，并且保护卖家隐私。</span>
            </div>



            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>Our Promise</span></h2>
            </div>

            <div class="col_one_third">
                <div class="feature-box fbox-large fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-screen i-alt"></i></a>
                    </div>
                    <h3>免费</h3>
                    <p>TIAOPC对所有注册用户完全免费。</p>
                </div>
            </div>
            <div class="col_one_third">
                <div class="feature-box fbox-large fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-eye i-alt"></i></a>
                    </div>
                    <h3>用户隐私</h3>
                    <p>TIAOPC将竭尽所能保护用户的信息安全。</p>
                </div>
            </div>
            <div class="col_one_third col_last">
                <div class="feature-box fbox-large fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-beaker i-alt"></i></a>
                    </div>
                    <h3>交易自由</h3>
                    <p>用户可以自由选择交易模式进行交易，TIAOPC不会对此进行任何干预，但同时TIAOPC将不承担任何由此产生的法律责任。</p>
                </div>
            </div>
            <div class="col_one_third">
                <div class="feature-box fbox-large fbox-outline fbox-dark fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-stack i-alt"></i></a>
                    </div>
                    <h3>设计简约</h3>
                    <p>经过严格把关，投标筛选，TIAOPC采纳著名设计师及网红”冯天晓旸“先生的设计方案，造就了一个拥有简约，明朗风格的网站logo。</p>
                </div>
            </div>
            <div class="col_one_third">
                <div class="feature-box fbox-large fbox-outline fbox-dark fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-thumbs-up i-alt"></i></a>
                    </div>
                    <h3>针对学生</h3>
                    <p>TIAOPC网站创立的目的是让学生在学习与生活中方便明了地买卖闲置的产品。</p>
                </div>
            </div>
            <div class="col_one_third col_last">
                <div class="feature-box fbox-large fbox-outline fbox-dark fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-text-width i-alt"></i></a>
                    </div>
                    <h3>产品源可靠</h3>
                    <p>我们将通过学校邮箱验证等方式，竭力保证tiaopc上的每一个产品来源安全可靠。</p>
                </div>
            </div>



            <div class="line"></div>
            <div class="clear"></div>


            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>Our Team</span></h2>
            </div>

            <div class="row clearfix">

                        {{-- yw --}}
                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ cdn('assets/others/team/wangyue.jpg')}}" alt="王悦">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>王悦</h4><span>Full Stack</span></div>
                                    <div class="team-content">
                                        <p>这是自己的第二个网站相关的项目，从简入手，以最简单的功能实现更加安全和方便的交易过程。
                                        非常希望来自各方各面的宝贵建议！
                                        </p>
                                    </div>
                                    <a href="http://www.weibo.com/u/1714781913/" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-weibo2"></i>
                                        <i class="icon-weibo2"></i>
                                    </a>
                                    <a href="https://instagram.com/patrickwang1029" class="social-icon si-rounded si-small si-light si-facebook">
                                        <i class="icon-instagram2"></i>
                                        <i class="icon-instagram2"></i>
                                    </a>
                                    
{{--                                     <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        {{-- wxy --}}
                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ cdn('assets/others/team/xiaoyang.jpg')}}" alt="王潇阳">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>王潇阳</h4><span>程序媛</span></div>
                                    <div class="team-content">
                                        <p>坚信Programing即艺术的程序媛。
                                        纵观生活中无处不在的绘画，音乐与摄影…… 会发现Programming也不过是艺术创作的另一种表达方式。
                                        </p>
                                    </div>
                                    <a href="http://www.weibo.com/iMonkey222" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-weibo2"></i>
                                        <i class="icon-weibo2"></i>
                                    </a>
                                     <a href="https://instagram.com/xiao_yangerr/" class="social-icon si-rounded si-small si-light si-facebook">
                                        <i class="icon-instagram2"></i>
                                        <i class="icon-instagram2"></i>
                                    </a>
{{--                                     <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>


                        {{-- runze --}}
                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ cdn('assets/others/team/runze.jpg')}}" alt="吴润泽">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>吴润泽</h4><span>双鱼男</span></div>
                                    <div class="team-content">
                                        <p>
                                            理科数学狗，文学爱好者，喜欢美食和旅游.
                                        </p>
                                    </div>
                                    <a href="http://www.weibo.com/u/3300710475" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-weibo2"></i>
                                        <i class="icon-weibo2"></i>
                                    </a>
 {{--                                    <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        {{-- zenge --}}
                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ cdn('assets/others/team/zengge.jpg')}}" alt="曾昊山">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>曾昊山</h4><span>ZHS</span></div>
                                    <div class="team-content">
                                    <p>
                                        莫听穿林打叶声<br>
                                        何妨吟啸且徐行<br>
                                        竹杖芒鞋轻胜马<br>
                                        谁怕<br>
                                        一蓑烟雨任平生<br><br>
                                        前路漫漫，以此自勉。<br>
                                        
                                    </p>

                                    </div>
                                    <a href="http://www.weibo.com/vampire0z" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-weibo2"></i>
                                        <i class="icon-weibo2"></i>
                                    </a>
                                     <a href="https://instagram.com/call_me_homework" class="social-icon si-rounded si-small si-light si-facebook">
                                        <i class="icon-instagram2"></i>
                                        <i class="icon-instagram2"></i>
                                    </a>                                  
{{--                                     <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>

                        {{-- pengge --}}
                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ cdn('assets/others/team/pengge.jpg')}}" alt="杨昊鹏">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>杨昊鹏</h4><span>幸福的拾荒者</span></div>
                                    <div class="team-content">
                                        <p>一个承诺，一份执著。</p>
                                    </div>
                                    <a href="http://www.weibo.com/yhpblog" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-weibo2"></i>
                                        <i class="icon-weibo2"></i>
                                    </a>
                                     <a href="https://instagram.com/haopengyang" class="social-icon si-rounded si-small si-light si-facebook">
                                        <i class="icon-instagram2"></i>
                                        <i class="icon-instagram2"></i>
                                    </a>                                  
{{--                                     <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>

                        {{-- unknown --}}
                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ cdn('assets/others/team/wenhao.jpg')}}" alt="">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>未知</h4><span>未知</span></div>
                                    <div class="team-content">
                                        <p>我们期待你的加入！</p>
                                    </div>
{{--                                     <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>        

            </div>


            <div class="line"></div>
            <div class="clear"></div>

            <div class="promo promo-light bottommargin">
                <h3>Email us at <span>tiaopcofficial@gmail.com</span></h3>
                <span>To make it better for the Tiaopc v2.0</span>
                <a href="mailto:tiaopcofficial@gmail.com" class="button button-dark button-xlarge button-rounded">Send Now</a>
            </div>


{{-- 
            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>Feedback</span></h2>
            </div>
             --}}
 {{--          <form class="nobottommargin" id="template-contactform" name="template-contactform" action="" method="post" >

                            <div class="form-process"></div>

                            <div class="col_half">
                                <label for="template-contactform-name">Name <small>*</small></label>
                                <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control" >
                            </div>

                            <div class="col_half col_last">
                                <label for="template-contactform-email">Email <small>*</small></label>
                                <input type="email" id="template-contactform-email" name="email" value="" class="email sm-form-control" >
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-message">Message <small>*</small></label>
                                <textarea class=" sm-form-control" id="template-contactform-message" name="message" rows="6" cols="30" ></textarea>
                            </div>

                            <div class="col_full hidden">
                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
                            </div>

                            <div class="col_full">
                                <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" disabled value="submit">Send Message</button>
                            </div>

            </form> --}}






            </div>

        </div>

    </div>

</section><!-- #content end -->
</section>
@stop
 


