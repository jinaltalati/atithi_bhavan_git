<!-- <script type="text/javascript" src="https://smarttemple.org/inline.c1cfbf1044520bec133d.bundle.js"></script>
<script type="text/javascript" src="https://smarttemple.org/polyfills.8f48f8f366a829614999.bundle.js"></script>
<script type="text/javascript" src="https://smarttemple.org/scripts.211927522454887d894a.bundle.js"></script>
<script type="text/javascript" src="https://smarttemple.org/vendor.04900451acf3b0ef4e92.bundle.js"></script> -->

</body></html>

<div class="modal fade" id="myChangePassModal" tabindex="-1" role="dialog"  style="top: 20%;">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
	    <div class="modal-header" style="background: #d84315; color: white;">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	    	<h4 class="md2-dialog-title" id="myDialogLabel">Change password</h4>
	    </div>
	    <div class="modal-body">
	       
		    	<form _ngcontent-njc-82="" class="ng-untouched ng-pristine ng-invalid">
			        <div _ngcontent-njc-82="" class="col-md-12 margin-top-30">

			        	<input type="password" name="old_password" class="form-control" placeholder="Current password *" required="required">
			          
			        </div>
			        <div _ngcontent-njc-82="" class="col-md-12 margin-top-30">

			        	<input type="password" name="new_password" class="form-control" placeholder="New password *" required="required">
			           
			        </div>
			        <div _ngcontent-njc-82="" class="col-md-12 margin-top-30">
			        	<input type="password" name="new_password" class="form-control" placeholder="Confirm password *" required="required">
			        </div>
			        <div _ngcontent-njc-82="" class="clearfix"></div>

			        <md2-dialog-footer _ngcontent-njc-82="">
			            <button _ngcontent-njc-82="" class="modal-save-btn" disabled="">Create
			            </button>
			        </md2-dialog-footer>
				</form>
		
	    </div>
	  </div>
	</div>
</div>

<div class="modal fade" id="myNumeroModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
	<div class="modal-dialog numero-dialog" role="document">
	  <div class="modal-content numero-content">
	    
	    <div class="modal-body">
	       <app-sidemenu  _nghost-ggi-83="">
		       	<div  class="vadatalLogo">
				    <img  src="<?= base_url(); ?>assets/images/templelogo2.jpeg">
				    <h3 ></h3>
				</div>

				<md-nav-list  class="md2 md-nav-list mainMenu" role="list">
				    <a  md-list-item="" role="listitem" routerlinkactive="active" href="<?= base_url(); ?>dashboard/welcome" class="active"><div class="md-list-item"><div class="md-list-text"></div>
				        <div  class="md-list-item">
				            <div  class="md-list-text"></div>
				            <i  class="material-icons">???</i> Home
				        </div>
				    </div></a>

				    <a  md-list-item="" role="listitem" routerlinkactive="active" href="<?= base_url(); ?>dashboard/room_listing"><div class="md-list-item"><div class="md-list-text"></div>
				        <div  class="md-list-item">
				            <div  class="md-list-text"></div>
				            <i  class="material-icons">???</i> Accommodation
				        </div>
				    </div></a>

				    <!--template bindings={}-->

				    <!--template bindings={}--><a  md-list-item="" role="listitem" routerlinkactive="active" href="<?= base_url(); ?>room_donation_report"><div class="md-list-item"><div class="md-list-text"></div>
				        <div  class="md-list-item">
				            <div  class="md-list-text"></div>
				            <i  class="material-icons">???</i> Reports
				        </div>
				    </div></a>

				    <!--template bindings={}-->
				</md-nav-list>
			</app-sidemenu>
	    </div>
	  </div>
	</div>
</div>

<style>
.numero-dialog {
    position: fixed;
    margin: auto;
    width: 20%;
    height: 100%;
   /* right: 0px;*/
}
.numero-content {
    height: 100%;
}
.modal-content{
	border-radius: 0px!important;
}
a:focus, a:hover {
  text-decoration: none; 
}
.box.box-bordered.box-color .box-title {
    border-color: #ff9800;
}
/*.box.box-bordered .box-title {
    border: 2px solid #ddd;
}*/
.box.box-color .box-title h3 {
    color: #000;
}
.box.box-color .box-title {
    background: #ff9800;
}
.box.box-bordered.box-color .box-content {
    border-color: #ff9800;
}
</style>
<style>

.vadatalLogo{text-align:center;margin-bottom:15px}.vadatalLogo   img{width:120px;text-align:center}.vadatalLogo   h3{margin:0;color:#d84315;font-size:20px;font-weight:700}.md2.md-nav-list.mainMenu{border-top:1px solid #f4f4f4}.md2.md-nav-list.mainMenu   i.material-icons{font-size:20px;margin-right:15px}md-list   a[md-list-item]   .md-list-item, md-list   md-list-item   .md-list-item, md-nav-list   a[md-list-item]   .md-list-item, md-nav-list   md-list-item   .md-list-item{font-family:Noto Sans,sans-serif;color:#333}md-list   a[md-list-item]   .md-list-item:hover, md-list   md-list-item   .md-list-item:hover, md-nav-list   a[md-list-item]   .md-list-item:hover, md-nav-list   md-list-item   .md-list-item:hover{color:#d84315}
</style>

<style type="text/css">
.btn_ad_ed{
    margin-left: 8%;
    margin-top: 3%;
    background: #d84315;
    color: #ffffff;
}

.btn_ad_ed:hover {
    background-color: #ff9800!important;
    color: black;
}

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: -5px;
    font-weight: 100!important;
    margin-top: 11px;
    margin-left: 13px!important;
    font-family: sans-serif!important;
}

span {
	font-family: sans-serif!important;
}

.chzn-single {
	height: 4.3%!important;
	margin-bottom: 1%!important; 
}

.dataTables_wrapper .dataTables_length {
    margin: 0px 10px 15px 10px!important;
}
</style>


<style>
    {.md-sidenav-container,.md-sidenav-content{transform:translate3d(0,0,0);display:block}.md-sidenav-container{position:relative;box-sizing:border-box;-webkit-overflow-scrolling:touch;overflow:hidden}.md-sidenav-backdrop,.md-sidenav-container[fullscreen]{position:absolute;top:0;bottom:0;right:0;left:0}.md-sidenav-container[fullscreen].md-sidenav-opened{overflow:hidden}.md-sidenav-backdrop{display:block;z-index:2;visibility:hidden}.md-sidenav-backdrop.md-sidenav-shown{visibility:visible}@media screen and (-ms-high-contrast:active){.md-sidenav-backdrop{opacity:.5}}.md-sidenav-content{position:relative;height:100%;overflow:auto}md-sidenav,md-sidenav.md-sidenav-closing{transform:translate3d(-100%,0,0)}md-sidenav{display:block;position:absolute;top:0;bottom:0;z-index:3;min-width:5%;outline:0}md-sidenav.md-sidenav-closed{visibility:hidden}md-sidenav.md-sidenav-opened,md-sidenav.md-sidenav-opening{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12);transform:translate3d(0,0,0)}md-sidenav.md-sidenav-opening{visibility:visible}md-sidenav.md-sidenav-end,md-sidenav.md-sidenav-end.md-sidenav-closing{transform:translate3d(100%,0,0)}md-sidenav.md-sidenav-side{z-index:1}md-sidenav.md-sidenav-end{right:0}md-sidenav.md-sidenav-end.md-sidenav-closed{visibility:hidden}md-sidenav.md-sidenav-end.md-sidenav-opened,md-sidenav.md-sidenav-end.md-sidenav-opening{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12);transform:translate3d(0,0,0)}md-sidenav.md-sidenav-end.md-sidenav-opening{visibility:visible}[dir=rtl] md-sidenav,[dir=rtl] md-sidenav.md-sidenav-closing{transform:translate3d(100%,0,0)}[dir=rtl] md-sidenav.md-sidenav-closed{visibility:hidden}[dir=rtl] md-sidenav.md-sidenav-opened,[dir=rtl] md-sidenav.md-sidenav-opening{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12);transform:translate3d(0,0,0)}[dir=rtl] md-sidenav.md-sidenav-opening{visibility:visible}[dir=rtl] md-sidenav.md-sidenav-end{left:0;right:auto;transform:translate3d(-100%,0,0)}[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-closed{visibility:hidden}[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-closing{transform:translate3d(-100%,0,0)}[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-opened,[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-opening{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12);transform:translate3d(0,0,0)}[dir=rtl] md-sidenav.md-sidenav-end.md-sidenav-opening{visibility:visible}.md-sidenav-focus-trap{height:100%}.md-sidenav-focus-trap>.cdk-focus-trap-content{box-sizing:border-box;height:100%;overflow-y:auto;transform:translateZ(0)}.md-sidenav-invalid{display:none}</style><style>.md-sidenav-content,md-sidenav{transition:transform .4s cubic-bezier(.25,.8,.25,1)}.md-sidenav-backdrop.md-sidenav-shown{transition:background-color .4s cubic-bezier(.25,.8,.25,1)}</style><style>.demo-rotini{background-color:skyblue}.demo-fusilli, .demo-rotini{padding:10px;border:1px solid #000}.demo-fusilli{background-color:#fafad2}.demo-spagetti{margin:0;padding:10px;border:1px solid #000;color:#fff;background-color:#639;opacity:.5}#md-overlay-0{top:18px!important}#md-overlay-0   .md-menu-panel{min-width:370px!important;max-width:600px!important}.profile-character{line-height:75px;text-align:center;color:#fff;font-size:32px;background:#d84315!important}.profile-image-circle{height:75px;width:75px;border-radius:50%}.top-header-icon-image{height:36px;width:36px;border-radius:50%}.profile-menu{position:fixed;right:12px;width:370px;box-shadow:0 4px 10px 5px rgba(0,0,0,.2)!important;background:#fff;top:60px;z-index:99!important}.profile-menu-bg{position:fixed;height:100%;width:100%;content:"";left:0;top:0;z-index:9!important}.material-icons.up-arrow{top:-14px;right:10px;position:absolute}</style><style>md-toolbar,md-toolbar md-toolbar-row{display:flex;box-sizing:border-box;width:100%}md-toolbar{font-size:20px;font-weight:400;font-family:Roboto,"Helvetica Neue",sans-serif;padding:0 16px;flex-direction:column;min-height:64px}md-toolbar md-toolbar-row{flex-direction:row;align-items:center}md-toolbar-row{height:64px}@media (max-width:600px) and (orientation:portrait){md-toolbar{min-height:56px}md-toolbar-row{height:56px}}@media (max-width:960px) and (orientation:landscape){md-toolbar{min-height:48px}md-toolbar-row{height:48px}}</style><style>md-icon{background-repeat:no-repeat;display:inline-block;fill:currentColor;height:24px;width:24px}</style><style>.md2-dialog-panel{position:relative;max-width:90vw;width:600px;border-radius:3px;background-color:#fff;overflow:hidden;box-shadow:0 11px 15px -7px rgba(0,0,0,.2),0 24px 38px 3px rgba(0,0,0,.14),0 9px 46px 8px rgba(0,0,0,.12)}.md2-dialog-header{background:#2196f3;color:#fff;font-size:25px;line-height:1.1;font-weight:500;padding:0 48px 0 16px;border-bottom:1px solid #e5e5e5;word-wrap:break-word}.md2-dialog-header .close{position:absolute;top:21px;right:16px;display:inline-block;width:18px;height:18px;overflow:hidden;-webkit-appearance:none;padding:0;cursor:pointer;background:0 0;border:0;outline:0;opacity:.8;font-size:0;z-index:1;min-width:initial;box-shadow:none;margin:0}.md2-dialog-header .close::after,.md2-dialog-header .close::before{content:'';position:absolute;top:50%;left:0;width:100%;height:2px;margin-top:-1px;background:#ccc;border-radius:2px}.md2-dialog-header .close::before{transform:rotate(45deg)}.md2-dialog-header .close::after{transform:rotate(-45deg)}.md2-dialog-header .close:hover{opacity:1}.md2-dialog-header .md2-dialog-title,.md2-dialog-header md2-dialog-title{display:block;margin:0;padding:16px 0;font-size:25px;font-weight:500}.md2-dialog-header dialog-header{line-height:33px}.md2-dialog-body{position:relative;max-height:65vh;padding:16px;overflow-y:auto}.md2-dialog-footer,md2-dialog-footer{display:block;padding:16px;text-align:right;border-top:1px solid rgba(0,0,0,.12)}.cdk-global-overlay-wrapper,.cdk-overlay-container{pointer-events:none;top:0;left:0;height:100%;width:100%}.cdk-overlay-container{position:fixed;z-index:1000}.cdk-global-overlay-wrapper{display:flex;position:absolute;z-index:1000}.cdk-overlay-pane{position:absolute;pointer-events:auto;box-sizing:border-box;z-index:1000}.cdk-overlay-backdrop{position:absolute;top:0;bottom:0;left:0;right:0;z-index:1000;pointer-events:auto;transition:opacity .4s cubic-bezier(.25,.8,.25,1);opacity:0}.cdk-overlay-backdrop.cdk-overlay-backdrop-showing{opacity:.48}.cdk-overlay-dark-backdrop{background:rgba(0,0,0,.6)}</style><style>md-input,md-textarea{display:inline-block;position:relative;font-family:Roboto,"Helvetica Neue",sans-serif;line-height:normal;text-align:left}.md-input-element.md-end,[dir=rtl] md-input,[dir=rtl] md-textarea{text-align:right}.md-input-wrapper{margin:16px 0}.md-input-table{display:inline-table;flex-flow:column;vertical-align:bottom;width:100%}.md-input-table>*{display:table-cell}.md-input-infix{position:relative}.md-input-element{font:inherit;background:0 0;color:currentColor;border:none;outline:0;padding:0;width:100%}[dir=rtl] .md-input-element.md-end{text-align:left}.md-input-element:-moz-ui-invalid{box-shadow:none}.md-input-element:-webkit-autofill+.md-input-placeholder.md-float{display:block;padding-bottom:5px;transform:translateY(-100%) scale(.75);width:133.33333%}.md-input-placeholder{position:absolute;left:0;top:0;font-size:100%;pointer-events:none;z-index:1;width:100%;display:none;white-space:nowrap;text-overflow:ellipsis;overflow-x:hidden;transform:translateY(0);transform-origin:bottom left;transition:transform .4s cubic-bezier(.25,.8,.25,1),scale .4s cubic-bezier(.25,.8,.25,1),color .4s cubic-bezier(.25,.8,.25,1),width .4s cubic-bezier(.25,.8,.25,1)}.md-input-placeholder.md-empty{display:block;cursor:text}.md-input-placeholder.md-float.md-focused,.md-input-placeholder.md-float:not(.md-empty){display:block;padding-bottom:5px;transform:translateY(-100%) scale(.75);width:133.33333%}[dir=rtl] .md-input-placeholder{transform-origin:bottom right;left:auto;right:0}.md-input-underline{position:absolute;height:1px;width:100%;margin-top:4px;border-top-width:1px;border-top-style:solid}.md-input-underline.md-disabled{background-image:linear-gradient(to right,rgba(0,0,0,.26) 0,rgba(0,0,0,.26) 33%,transparent 0);background-size:4px 1px;background-repeat:repeat-x;border-top:0;background-position:0}.md-input-underline .md-input-ripple{position:absolute;height:2px;z-index:1;top:-1px;width:100%;transform-origin:top;opacity:0;transform:scaleY(0);transition:transform .4s cubic-bezier(.25,.8,.25,1),opacity .4s cubic-bezier(.25,.8,.25,1)}.md-input-underline .md-input-ripple.md-focused{opacity:1;transform:scaleY(1)}.md-hint{display:block;position:absolute;font-size:75%;bottom:-.5em}.md-hint.md-right{right:0}[dir=rtl] .md-hint{right:0;left:auto}[dir=rtl] .md-hint.md-right{right:auto;left:0}</style><style>md-list,md-nav-list{padding-top:8px;display:block}md-list [md-subheader],md-nav-list [md-subheader]{display:block;box-sizing:border-box;height:48px;padding:16px;margin:0;font-size:14px;font-weight:500}md-list [md-subheader]:first-child,md-nav-list [md-subheader]:first-child{margin-top:-8px}md-list a[md-list-item],md-list md-list-item,md-nav-list a[md-list-item],md-nav-list md-list-item{display:block}md-list a[md-list-item] .md-list-item,md-list md-list-item .md-list-item,md-nav-list a[md-list-item] .md-list-item,md-nav-list md-list-item .md-list-item{display:flex;flex-direction:row;align-items:center;font-family:Roboto,"Helvetica Neue",sans-serif;box-sizing:border-box;font-size:16px;height:48px;padding:0 16px}md-list a[md-list-item].md-list-avatar .md-list-item,md-list md-list-item.md-list-avatar .md-list-item,md-nav-list a[md-list-item].md-list-avatar .md-list-item,md-nav-list md-list-item.md-list-avatar .md-list-item{height:56px}md-list a[md-list-item].md-2-line .md-list-item,md-list md-list-item.md-2-line .md-list-item,md-nav-list a[md-list-item].md-2-line .md-list-item,md-nav-list md-list-item.md-2-line .md-list-item{height:72px}md-list a[md-list-item].md-3-line .md-list-item,md-list md-list-item.md-3-line .md-list-item,md-nav-list a[md-list-item].md-3-line .md-list-item,md-nav-list md-list-item.md-3-line .md-list-item{height:88px}md-list a[md-list-item].md-multi-line .md-list-item,md-list md-list-item.md-multi-line .md-list-item,md-nav-list a[md-list-item].md-multi-line .md-list-item,md-nav-list md-list-item.md-multi-line .md-list-item{height:100%;padding:8px 16px}md-list a[md-list-item] .md-list-text,md-list md-list-item .md-list-text,md-nav-list a[md-list-item] .md-list-text,md-nav-list md-list-item .md-list-text{display:flex;flex-direction:column;width:100%;box-sizing:border-box;overflow:hidden;padding:0 16px}md-list a[md-list-item] .md-list-text>*,md-list md-list-item .md-list-text>*,md-nav-list a[md-list-item] .md-list-text>*,md-nav-list md-list-item .md-list-text>*{margin:0;padding:0;font-weight:400;font-size:inherit}md-list a[md-list-item] .md-list-text:empty,md-list md-list-item .md-list-text:empty,md-nav-list a[md-list-item] .md-list-text:empty,md-nav-list md-list-item .md-list-text:empty{display:none}md-list a[md-list-item] .md-list-text:first-child,md-list md-list-item .md-list-text:first-child,md-nav-list a[md-list-item] .md-list-text:first-child,md-nav-list md-list-item .md-list-text:first-child{padding:0}md-list a[md-list-item] [md-list-avatar],md-list md-list-item [md-list-avatar],md-nav-list a[md-list-item] [md-list-avatar],md-nav-list md-list-item [md-list-avatar]{flex-shrink:0;width:40px;height:40px;border-radius:50%}md-list a[md-list-item] [md-list-icon],md-list md-list-item [md-list-icon],md-nav-list a[md-list-item] [md-list-icon],md-nav-list md-list-item [md-list-icon]{width:24px;height:24px;border-radius:50%;padding:4px}md-list a[md-list-item] [md-line],md-list md-list-item [md-line],md-nav-list a[md-list-item] [md-line],md-nav-list md-list-item [md-line]{white-space:nowrap;overflow-x:hidden;text-overflow:ellipsis;display:block;box-sizing:border-box}md-list a[md-list-item] [md-line]:nth-child(n+2),md-list md-list-item [md-line]:nth-child(n+2),md-nav-list a[md-list-item] [md-line]:nth-child(n+2),md-nav-list md-list-item [md-line]:nth-child(n+2){font-size:14px}md-list[dense],md-nav-list[dense]{padding-top:4px;display:block}md-list[dense] [md-subheader],md-nav-list[dense] [md-subheader]{display:block;box-sizing:border-box;height:40px;padding:16px;margin:0;font-size:13px;font-weight:500}md-list[dense] [md-subheader]:first-child,md-nav-list[dense] [md-subheader]:first-child{margin-top:-4px}md-list[dense] a[md-list-item],md-list[dense] md-list-item,md-nav-list[dense] a[md-list-item],md-nav-list[dense] md-list-item{display:block}md-list[dense] a[md-list-item] .md-list-item,md-list[dense] md-list-item .md-list-item,md-nav-list[dense] a[md-list-item] .md-list-item,md-nav-list[dense] md-list-item .md-list-item{display:flex;flex-direction:row;align-items:center;font-family:Roboto,"Helvetica Neue",sans-serif;box-sizing:border-box;font-size:13px;height:40px;padding:0 16px}md-list[dense] a[md-list-item].md-list-avatar .md-list-item,md-list[dense] md-list-item.md-list-avatar .md-list-item,md-nav-list[dense] a[md-list-item].md-list-avatar .md-list-item,md-nav-list[dense] md-list-item.md-list-avatar .md-list-item{height:48px}md-list[dense] a[md-list-item].md-2-line .md-list-item,md-list[dense] md-list-item.md-2-line .md-list-item,md-nav-list[dense] a[md-list-item].md-2-line .md-list-item,md-nav-list[dense] md-list-item.md-2-line .md-list-item{height:60px}md-list[dense] a[md-list-item].md-3-line .md-list-item,md-list[dense] md-list-item.md-3-line .md-list-item,md-nav-list[dense] a[md-list-item].md-3-line .md-list-item,md-nav-list[dense] md-list-item.md-3-line .md-list-item{height:76px}md-list[dense] a[md-list-item].md-multi-line .md-list-item,md-list[dense] md-list-item.md-multi-line .md-list-item,md-nav-list[dense] a[md-list-item].md-multi-line .md-list-item,md-nav-list[dense] md-list-item.md-multi-line .md-list-item{height:100%;padding:8px 16px}md-list[dense] a[md-list-item] .md-list-text,md-list[dense] md-list-item .md-list-text,md-nav-list[dense] a[md-list-item] .md-list-text,md-nav-list[dense] md-list-item .md-list-text{display:flex;flex-direction:column;width:100%;box-sizing:border-box;overflow:hidden;padding:0 16px}md-list[dense] a[md-list-item] .md-list-text>*,md-list[dense] md-list-item .md-list-text>*,md-nav-list[dense] a[md-list-item] .md-list-text>*,md-nav-list[dense] md-list-item .md-list-text>*{margin:0;padding:0;font-weight:400;font-size:inherit}md-list[dense] a[md-list-item] .md-list-text:empty,md-list[dense] md-list-item .md-list-text:empty,md-nav-list[dense] a[md-list-item] .md-list-text:empty,md-nav-list[dense] md-list-item .md-list-text:empty{display:none}md-list[dense] a[md-list-item] .md-list-text:first-child,md-list[dense] md-list-item .md-list-text:first-child,md-nav-list[dense] a[md-list-item] .md-list-text:first-child,md-nav-list[dense] md-list-item .md-list-text:first-child{padding:0}md-list[dense] a[md-list-item] [md-list-avatar],md-list[dense] md-list-item [md-list-avatar],md-nav-list[dense] a[md-list-item] [md-list-avatar],md-nav-list[dense] md-list-item [md-list-avatar]{flex-shrink:0;width:40px;height:40px;border-radius:50%}md-list[dense] a[md-list-item] [md-list-icon],md-list[dense] md-list-item [md-list-icon],md-nav-list[dense] a[md-list-item] [md-list-icon],md-nav-list[dense] md-list-item [md-list-icon]{width:24px;height:24px;border-radius:50%;padding:4px}md-list[dense] a[md-list-item] [md-line],md-list[dense] md-list-item [md-line],md-nav-list[dense] a[md-list-item] [md-line],md-nav-list[dense] md-list-item [md-line]{white-space:nowrap;overflow-x:hidden;text-overflow:ellipsis;display:block;box-sizing:border-box}md-list[dense] a[md-list-item] [md-line]:nth-child(n+2),md-list[dense] md-list-item [md-line]:nth-child(n+2),md-nav-list[dense] a[md-list-item] [md-line]:nth-child(n+2),md-nav-list[dense] md-list-item [md-line]:nth-child(n+2){font-size:13px}md-divider{display:block;border-top-style:solid;border-top-width:1px;margin:0}md-nav-list a{text-decoration:none;color:inherit}md-nav-list .md-list-item{cursor:pointer}md-nav-list .md-list-item.md-list-item-focus,md-nav-list .md-list-item:hover{outline:0}</style><style>.inner-loader[_ngcontent-ggi-65]{display:inline;position:fixed;top:65px;z-index:99999!important;width:100%;text-align:center}.inner-loader[_ngcontent-ggi-65]   span[_ngcontent-ggi-65]{font-size:16px;font-weight:700;color:#fff}.white-fixed-layer[_ngcontent-ggi-65]{position:fixed;height:100%;width:100%;background:hsla(0,0%,100%,.25);z-index:9999!important}</style><style>.md-button-focus[md-button] .md-button-focus-overlay,.md-button-focus[md-fab] .md-button-focus-overlay,.md-button-focus[md-icon-button] .md-button-focus-overlay,.md-button-focus[md-mini-fab] .md-button-focus-overlay,.md-button-focus[md-raised-button] .md-button-focus-overlay,[md-button]:hover .md-button-focus-overlay,[md-icon-button]:hover .md-button-focus-overlay{opacity:1}[md-icon-button],[md-mini-fab]{width:40px;height:40px}[md-button],[md-fab],[md-icon-button],[md-mini-fab],[md-raised-button]{box-sizing:border-box;position:relative;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;outline:0;border:none;display:inline-block;white-space:nowrap;text-decoration:none;vertical-align:baseline;font-size:14px;font-family:Roboto,"Helvetica Neue",sans-serif;font-weight:500;color:currentColor;text-align:center;margin:0;min-width:88px;line-height:36px;padding:0 16px;border-radius:2px}[disabled][md-button],[disabled][md-fab],[disabled][md-icon-button],[disabled][md-mini-fab],[disabled][md-raised-button]{cursor:default}[md-fab],[md-mini-fab],[md-raised-button]{box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);transform:translate3d(0,0,0);transition:background .4s cubic-bezier(.25,.8,.25,1),box-shadow 280ms cubic-bezier(.4,0,.2,1)}[md-fab],[md-mini-fab]{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12);flex-shrink:0;padding:0;min-width:0;border-radius:50%}[md-fab]:active,[md-mini-fab]:active,[md-raised-button]:active{box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)}[disabled][md-fab],[disabled][md-mini-fab],[disabled][md-raised-button]{box-shadow:none}[md-button][disabled]:hover .md-button-focus-overlay,[md-button][disabled]:hover.md-accent,[md-button][disabled]:hover.md-primary,[md-button][disabled]:hover.md-warn,[md-icon-button][disabled]:hover .md-button-focus-overlay,[md-icon-button][disabled]:hover.md-accent,[md-icon-button][disabled]:hover.md-primary,[md-icon-button][disabled]:hover.md-warn{background-color:transparent}[md-fab]{width:56px;height:56px}[md-fab]:active,[md-mini-fab]:active{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 12px 17px 2px rgba(0,0,0,.14),0 5px 22px 4px rgba(0,0,0,.12)}[md-fab] i,[md-fab] md-icon{padding:16px 0;line-height:24px}[md-mini-fab] i,[md-mini-fab] md-icon{padding:8px 0;line-height:24px}[md-icon-button]{padding:0;min-width:0;flex-shrink:0;line-height:40px;border-radius:50%}[md-icon-button] i,[md-icon-button] md-icon{line-height:24px}[md-button] .md-button-wrapper>*,[md-icon-button] .md-button-wrapper>*,[md-raised-button] .md-button-wrapper>*{vertical-align:middle}.md-button-focus-overlay,.md-button-ripple{position:absolute;top:0;left:0;bottom:0;right:0}.md-button-focus-overlay{background-color:rgba(0,0,0,.12);border-radius:inherit;pointer-events:none;opacity:0}.md-button-ripple-round{border-radius:50%;z-index:1}@media screen and (-ms-high-contrast:active){.md-button-focus-overlay{background-color:rgba(255,255,255,.5)}[md-button],[md-fab],[md-icon-button],[md-mini-fab],[md-raised-button]{outline:solid 1px}}</style><style>.card-body{margin-left:10px;margin-right:10px}.md-card, .mdCard{box-shadow:0 0 0 0 #fff}.cardBlogs{text-align:center;box-shadow:0 0 0 0 rgba(0,0,0,.2),0 0 0 0 rgba(0,0,0,.14),0 0 0 0 rgba(0,0,0,.12)}.cardBlogs   h3, .cardBlogs   h6{margin:0;padding:0;font-weight:400}.cardBlogs   h3{color:#333;font-size:18px}.cardBlogs   h6{padding:0 30px;font-size:14px;color:#888}.cardBlogs   img{width:67px;cursor:pointer}.cardBlogs   .md-card-title-group{margin:0}.cardBlogs:hover{background:#f3f3f3}.md-card:hover{box-shadow:0 0 0 0 #fff}footer, footer   md-card{background:#f3f3f3}footer   .cardBlogs   img{width:60px}footer   .cardBlogs   h3{font-size:13px;font-weight:600}footer   .cardBlogs{margin-left:70px;position:fixed;width:100%;bottom:35px;margin:0;padding:18px 26px 2px}footer   .moreControlSection{position:fixed;width:100%;bottom:0;margin:0;padding:9px 20px;text-align:center;color:#aaa;font-size:14px;border-top:1px solid #ddd;cursor:pointer}footer   .moreControlSection   span{cursor:pointer;font-weight:700;color:#6a6a6a!important}</style><style>md-card{box-shadow:0 3px 1px -2px rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12);transition:box-shadow 280ms cubic-bezier(.4,0,.2,1);will-change:box-shadow;display:block;position:relative;padding:24px;border-radius:2px;font-family:Roboto,"Helvetica Neue",sans-serif}@media screen and (-ms-high-contrast:active){md-card{outline:solid 1px}}.md-card-flat{box-shadow:none}md-card-actions,md-card-content,md-card-subtitle,md-card-title{display:block;margin-bottom:16px}md-card-title{font-size:24px;font-weight:400}md-card-content,md-card-header md-card-title,md-card-subtitle{font-size:14px}md-card-actions{margin-left:-16px;margin-right:-16px;padding:8px 0}md-card-actions[align=end]{display:flex;justify-content:flex-end}[md-card-image]{width:calc(100% + 48px);margin:0 -24px 16px}[md-card-xl-image]{width:240px;height:240px;margin:-8px}md-card-footer{position:absolute;width:100%;min-height:5px;bottom:0;left:0}md-card-actions [md-button],md-card-actions [md-raised-button]{margin:0 4px}md-card-header{display:flex;flex-direction:row;height:40px;margin:-8px 0 16px}.md-card-header-text{height:40px;margin:0 8px}[md-card-avatar]{height:40px;width:40px;border-radius:50%}[md-card-lg-image],[md-card-md-image],[md-card-sm-image]{margin:-8px 0}md-card-title-group{display:flex;justify-content:space-between;margin:0 -8px}[md-card-sm-image]{width:80px;height:80px}[md-card-md-image]{width:112px;height:112px}[md-card-lg-image]{width:152px;height:152px}@media (max-width:600px){md-card{padding:24px 16px}[md-card-image]{width:calc(100% + 32px);margin:16px -16px}md-card-title-group{margin:0}[md-card-xl-image]{margin-left:0;margin-right:0}md-card-header{margin:-8px 0 0}}md-card-content>:first-child,md-card>:first-child{margin-top:0}md-card-content>:last-child,md-card>:last-child{margin-bottom:0}[md-card-image]:first-child{margin-top:-24px}md-card>md-card-actions:last-child{margin-bottom:-16px;padding-bottom:0}md-card-actions [md-button]:first-child,md-card-actions [md-raised-button]:first-child{margin-left:0;margin-right:0}md-card-subtitle:not(:first-child),md-card-title:not(:first-child){margin-top:-4px}md-card-header md-card-subtitle:not(:first-child),md-card>[md-card-xl-image]:first-child{margin-top:-8px}md-card>[md-card-xl-image]:last-child{margin-bottom:-8px}</style><style>md-grid-list{display:block;position:relative}md-grid-tile{display:block;position:absolute;overflow:hidden}md-grid-tile figure{display:flex;position:absolute;align-items:center;justify-content:center;height:100%;top:0;right:0;bottom:0;left:0;padding:0;margin:0}md-grid-tile md-grid-tile-footer,md-grid-tile md-grid-tile-header{display:flex;align-items:center;height:48px;color:#fff;background:rgba(0,0,0,.38);overflow:hidden;padding:0 16px;font-size:16px;position:absolute;left:0;right:0}md-grid-tile md-grid-tile-footer [md-line],md-grid-tile md-grid-tile-header [md-line]{white-space:nowrap;overflow-x:hidden;text-overflow:ellipsis;display:block;box-sizing:border-box}md-grid-tile md-grid-tile-footer [md-line]:nth-child(n+2),md-grid-tile md-grid-tile-header [md-line]:nth-child(n+2){font-size:12px}md-grid-tile .md-grid-list-text>*,md-grid-tile md-grid-tile-footer>*,md-grid-tile md-grid-tile-header>*{margin:0;padding:0;font-weight:400;font-size:inherit}md-grid-tile md-grid-tile-footer.md-2-line,md-grid-tile md-grid-tile-header.md-2-line{height:68px}md-grid-tile .md-grid-list-text{display:flex;flex-direction:column;width:100%;box-sizing:border-box;overflow:hidden}md-grid-tile .md-grid-list-text:empty,md-grid-tile [md-grid-avatar]:empty{display:none}md-grid-tile md-grid-tile-header{top:0}md-grid-tile md-grid-tile-footer{bottom:0}md-grid-tile [md-grid-avatar]{padding-right:16px}[dir=rtl] md-grid-tile [md-grid-avatar]{padding-right:0;padding-left:16px}
</style>
