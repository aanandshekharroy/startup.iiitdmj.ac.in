<div class="sidebar">
                 @include('layouts.createThreadForm')
                  @if(Auth::guest()||!Auth::user()->isAdmin)
                      @if($errors->any())
                          <script type="text/javascript">
                              alert('{{$errors->first()}}')
                          </script>
                                  
                      @endif
                  @endif
                  <div class="gadget">
                    <h2 class="right_tabs"><span>Notices</span> </h2>
                    <div class="clr"></div>
                          <img src="/images/New_animated.gif"/>
                          <p> <strong>Workshop to be Conducted</strong><br />
                              <a href="https://docs.google.com/forms/d/e/1FAIpQLScuKZjw78z45Nbnvg3PburejQyoDy7usbnDlGNpgA6BRwg-AA/viewform">Online Registration Form</a><br />
                              </p>
                          
                    <div>
                    <a href="/workshop-1">1.&nbsp;<span data-term="goog_1463009198" tabindex="0">September 29</span>, 30 and&nbsp;
                    <span data-term="goog_1463009199" tabindex="0">October 1</span>
                    &nbsp;to be conducted by Mr. Sarvesh Goorha and Dr. Loveneesh Chanana</a>
                    </div>
                          <div><br />
                          </div>
                          <div>2.&nbsp;<span data-term="goog_1463009200" tabindex="0">October 5-7, 2016</span>&nbsp;to be conducted by Prof. Vinay Nangia and Dr. Samiksha Jain.</div>
</div>
                    <div class="gadget panel-gadget">
                      <h3 class="heading-threads">Have a Question ?</h3>
                      <div class="text-center">
                          <button id="new-thread-button" class="btn btn-broad" data-toggle="modal" data-target="#myModalThread">Ask</button>
                      </div>
                      <p style="padding-top:5px"></p>
                      <h5 class="heading-threads">Recent Discussions</h5>
                      @if(count($threads)>=1) 
                      @foreach ($threads as $thread)
                      {{--*/ $des = str_limit($thread->content, 45, '...') /*--}}
                      {{--*/ $title = str_limit($thread->title, 20, '...') /*--}}
                      <div class="row thread-row" style="border-top: 1px solid grey"
                      onclick="window.location.href='/forum/{{$thread->tUrl}}'">
                      <h4 style="color:#3e3d3d;">{{$title}}</h4><h6 style="color:#3e3d3d;">{{$des}}</h6>                
                      </div>
                      @endforeach
                      @else
                      <h2 class="primary-text">No discussions yet!</h2>
                      @endif
                      <a href="/forum">more >></a>
                    </div>
                        <div class="gadget">
                          <h2 class="right_tabs"><span>Important</span> Links</h2>
                          <div class="clr"></div>
                            <ul class="sb_menu">
                              <li><a href="facility.html">Facilities</a></li>
                              <li><a href="http://startupindia.gov.in/">Startup India Portal</a></li>
                              <li><a href="http://www.iiitdmj.ac.in/IIITDM/about.html" target="_blank">About IIITDMJ</a></li>
                            </ul>
                        </div>



                




              <div class="gadget" >



                  <h2 class="right_tabs"><span>Contact Persons</span></h2>



                  <div class="clr"></div>



         <!-- <ul class="sb_menu">
            
            <li><a href="https://www.easychair.org/account/signin.cgi?conf=care2013" target="_blank" style="color:#61c0ec;"><img src="images/b10Mj41363338225.gif" width="210" height="32" style="border:1px solid #b7b7b7;padding:4px;" /></a></li>
          
        </ul>-->
        <p><strong>Prof. Puneet Tandon</strong><br />
           Mechanical Engineering Discipline &amp; Design Discipline<br />
         
           <strong>e-mail:</strong><a href="mailto:ptandon@iiitdmj.ac.in"> ptandon[at]iiitdmj.ac.in</a><br />
           <strong>Tel.</strong> +91-761-2794411 <br />
           <br />
           <strong>Dr. Sraban Kumar Mohanty</strong><br />
           Computer Science &amp; Engineering<br />
          
           <strong>e-mail:</strong><a href="mailto:sraban@iiitdmj.ac.in"> sraban[at]iiitdmj.ac.in</a><br />
           <strong>Tel.</strong> +91-761-2794224 <br />
           <br />
           <strong>Dr. Sachin Kumar Jain</strong><br />
           Electronics &amp; Communication Engineering<br />
          
           <strong>e-mail:</strong><a href="mailto:skjain@iiitdmj.ac.in"> skjain[at]iiitdmj.ac.in</a><br />
          <strong>Tel.</strong> +91-761-2794468</p>

     </div>
     <div class="gadget" >



      <h2 class="right_tabs"><span> Startup India: Launch</span></h2>



      <div class="clr"></div>

      <p><iframe width="280px" src="https://www.youtube.com/embed/02Vr6aHn8kM" frameborder="0" allowfullscreen></iframe></p>




    </div>
    



