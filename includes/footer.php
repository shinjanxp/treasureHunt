<footer class="foot" id="footer">
        <div class="container footerpadding">
           
            <div class="col-md-4">
                <div id="credits" class="hidden-xs hidden-sm">
                    Supported By <a href="http://www.facebook.com/groups/iemcs/" target= "_blank">IEM Computer Society</a>
                </div>
            </div>
            <div class="col-md-4">
                <div id="credits">
                    &COPY; 2015 <a href="http://www.facebook.com/almost.there.innovacion14" target="__blank">Almost There </a></div>
            </div>
            <div class="col-md-6">
                <div id="credits" class="hidden-xs hidden-sm">
                    Sponsored By <a href="http://www.iem-innovacion.in" target="__blank">Innovaci&oacute;n</a>
                </div>
            </div>
        </div>
        
    </footer>
<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.als-1.2.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/bootstrap-notify.js"></script>
    <script type="text/javascript">
     
var liftoffTime = new Date("January 10, 2016 23:00:00");
var now=new Date();
var touchdownTime = new Date("January 13, 2016 22:00:00");
var counter = liftoffTime;
if(now>liftoffTime)
    counter=touchdownTime
$('#timer').countdown({until: counter, compact: true, 
    layout: '<b>{dn} {dl} {hnn}{sep}{mnn}{sep}{snn}</b> {desc}', 
    description: ''});
 
/*setInterval(function() { $('.bottom-right').notify({
    message: { text: 'The leaderboard has been frozen! But you can play it on your own!' },
    fadeOut: { enabled: true,delay: 10000 }
  }).show();
},200000);*/
    </script>