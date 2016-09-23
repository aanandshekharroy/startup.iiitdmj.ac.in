@extends('layouts.header_footer')

@section('slideshow')
@include('imageSlideshow')
@endsection

@section('content')
<div class="content">
    <div class="content_resize">
        <marquee scrollamount="3" behavior="alternate" > <a href="/docs/Startup Business Plan List update1.pdf">list of Business Plan</a> |  <a href="https://docs.google.com/forms/d/e/1FAIpQLScuKZjw78z45Nbnvg3PburejQyoDy7usbnDlGNpgA6BRwg-AA/viewform" style="color:#FF0000;">Workshop registration form</a></marquee>
        <div class="mainbar">
           <div class="article">
              <h2 class="main_heading"><span>Call for Proposals</span></h2>
              <div class="clr"></div>
              <table id="box-table-b" >
                <tbody>
                  <tr>

                    <td>The Institute invites your proposals for possible funding under the Startup Centre granted to the Institute as per the following schedule: <br /><br />

                       <ul style="margin-left:26px;">
                        <li> <img src="images/New_animated.gif" /> <a href="/docs/EOI-list.xlsx">List of Expression of Interest receipt</a></li></ul>
                        <ul style="margin-left:26px;">
                            <li>Brief Expression of Interest, <br />
                                <ul style="margin-left:35px;">EOI should content the followings:
                                    <li>    Motivation</li>
                                    <li>    Background work done</li>
                                    <li>    Problem identification</li>
                                    <li>    Brief Technical write-up</li>

                                </ul>  <strong>Last date of submission - <strike>June 06, 2016 </strike></strong></li>
                                <li>Detailed proposal, including proposed Business Model <br /> <strong>Last date of submission - <span style="color:#FF0000;"> July 25, 2016 </span></strong></li>
                            </ul>
                            <p><br />Kindly send your proposal to <a href="mailto:startup@iiitdmj.ac.in">startup@iiitdmj.ac.in.</a></p>

                            <br /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div class="article">
          <h2 class="main_heading"><span>Welcome to Startup IIITDM Jabalpur</span></h2>
          <div class="clr"></div>
          <p align="justify"> This initiative aims at fostering entrepreneurship and promoting innovation by creating an ecosystem that is conducive for growth of Start-ups. The objective is that India must become a nation of job creators instead of being a nation of job seekers. <br /><br />
          </p>
      </div>
    <div class="article">
      <h2 class="main_heading"><span>What is a Startup </span></h2>
      <div class="clr"></div>

      <p align="justify">The Government of India has announced 'Startup India' initiative for creating a
        conducive environment for startups in India. The various Ministries of the Government of India have initiated
        a number of activities for the purpose. <br />
        To bring uniformity in the identified enterprises, an entity shall be
        considered as a 'startup' -<br />
        <ul style="margin-left:20px;">
            <li>Up to five years from the date of its incorporation/registration,</li>
            <li>If its turnover for any of the financial years has not exceeded Rupees 25 crore, and</li>
            <li>lt is working towards innovation, development, deployment or commercialization of new products,
                processes or services driven by technology or intellectual property;</li>
            </ul>
            Provided that any such entity formed by splitting up or reconstruction of a business already in existence shall
            not be considered a 'startup';
        </p>
    </div>
    <div class="article">
         <h2 class="main_heading"><span>Process of recognition as a 'startup'</span></h2>
         <div class="clr"></div>

         <p align="justify">The process of recognition as a 'startup' shall be through mobile app/portal of the Department of
            Industrial Policy and Promotion. Startups will be required to submit a simple application with any of
            following documents:
         <ul style="margin-left:20px;text-align:justify;" >
            <li>A recommendation (with regard to innovative nature of business), in a format specified by
                Department of Industrial Policy and Promotion, from any Incubator established in a postgraduate
                college in India; or</li>
                <li>A letter of support by any incubator which is funded (in relation to the project) from
                    Government of India or any State Government as part of any specified scheme to promote
                    innovation; or</li>
                    <li>A recommendation (with regard to innovative nature of business), in a format specified by
                        Department of Industrial Policy and Promotion, from any Incubator recognized by Government
                        of India; or</li>
                        <li>A letter of funding of not less than 20 per cent in equity by any Incubation Fund/Angel
                            Fund/Private Equity Fund/Accelerator/Angel Network duly registered with Securities and
                            Exchange Board of India that endorses innovative nature of the business. Department of
                            Industrial Policy and Promotion may include any such fund in a negative list for such reasons
                            as it may deem fit; or</li>
                            <li>A letter of funding by Government of India or any State Government as part of any specified
                                scheme to promote innovation; or</li>
                                <li>A patent filed and published in the Journal by the Indian Patent Office in areas affiliated with
                                    the nature of business being promoted.</li>
                                </ul> 
                            </p>
    </div>
</div>

@include('layouts.right-sidebar')

 </div>


 <div class="clr"></div>



</div>



</div>



@endsection
