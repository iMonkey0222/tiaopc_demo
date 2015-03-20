
@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
About Us
@parent
@stop


@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h3>About Us</h3>
        <span></span>
        <ol class="breadcrumb">
            <li><a class="icon-home" href="#">Home</a></li>
            <li class="active icon-user">About Us</li>
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
                    <p>TIAOPC将竭尽所能保护用户的信息安全</p>
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

                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ asset('assets/others/team/runze.jpg')}}" alt="吴润泽">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>吴润泽</h4><span>腐国第一美男子</span></div>
                                    <div class="team-content">
                                        <p>是什么让网瘾少年忽然照镜成瘾，是什么让dota奇才深夜不再虐泉，是什么让华西坝扛把子放下鼠标写下《昊山讽齐王纳谏》，让我们一起走进应用数学系神童昊山.曾的内心世界。详情请点击http://tiaopc.com 独家光盘绝赞发售中， 现只接受网上预定,欲购从速，只要998！！！ </p>
                                    </div>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
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
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ asset('assets/others/team/zengge.jpg')}}" alt="曾昊山">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>曾昊山</h4><span>泽哥的死对头</span></div>
                                    <div class="team-content">
                                        <p>某日，吾窥镜自视，谓吾妻曰：“我孰与城北润泽美？”吾妻曰：“君美甚，润泽何能及君也？”城北润泽，腐国之美丽者也。吾不自信，而复问昊鹏曰：“吾孰与润泽美？”鹏曰：“润泽何能及君也？”旦日，悦从外来，与坐谈，问之悦曰：“吾与润泽孰美？”悦曰：“润泽不若君之美也。”</p>
                                    </div>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
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
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ asset('assets/others/team/xiaoyang.jpg')}}" alt="王潇阳">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>王潇阳</h4><span>小清新程序媛</span></div>
                                    <div class="team-content">
                                        <p>坚信Programing即艺术的程序媛。
                                        纵观生活中无处不在的绘画，音乐与摄影…… 会发现Programming也不过是艺术创作的另一种表达方式。
                                        </p>
                                    </div>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
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
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ asset('assets/others/team/pengge.jpg')}}" alt="杨昊鹏">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>杨昊鹏</h4><span>职业网球肌肉男</span></div>
                                    <div class="team-content">
                                        <p>一个承诺，一份执著。</p>
                                    </div>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
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
                                    </a>
                                </div>
                            </div>
                        </div>







                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ asset('assets/others/team/wangyue.jpg')}}" alt="王悦">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>王悦</h4><span>Full Stack</span></div>
                                    <div class="team-content">
                                        <p>这是自己的第二个网站相关的项目，第一个也是一个二手交易的平台，但是包含了复杂的交易过程。所以，做tiaopc.com的时候，从简入手，以最简单的功能实现更加安全和方便的交易过程。没错，忽略交易环节，只保留信息交流环节。
                                        非常希望来自各方各面的宝贵建议！
                                        </p>
                                    </div>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
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
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 bottommargin">
                            <div class="team team-list clearfix">
                                <div class="team-image">
                                    <img src="{{ asset('assets/others/team/wenhao.jpg')}}" alt="杨昊鹏">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4>未知</h4><span>未知</span></div>
                                    <div class="team-content">
                                        <p>我们期待你的加入！</p>
                                    </div>
                                    <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
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
                                    </a>
                                </div>
                            </div>
                        </div>        

            </div>





            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>Feedback</span></h2>
            </div>
            
          <form class="nobottommargin" id="template-contactform" name="template-contactform" action="" method="post" >

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

            </form>


            <div class="line"></div>
            <div class="clear"></div>




            </div>

        </div>

    </div>

</section><!-- #content end -->
</section>
@stop
 


