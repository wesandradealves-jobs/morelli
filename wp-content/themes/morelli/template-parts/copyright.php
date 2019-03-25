		<div class="copyright">
			<div class="container">
	          <p><?php echo "&#x24B8; Copyright ".date('Y')." - ".get_bloginfo('name')." - Todos os direitos reservados."; ?></p>
	          <p>
	            <a class="stamps" href="http://www.system-dreams.com.br" target="_blank" title="System Dreams - Criação e Otimização de Sites">Developed by SD</a>
	            <a class="stamps" href="javascript:void(0)" title="W3C | HTML5">W3C | HTML5</a>
	          </p>	
			</div>
		</div>
		<style>
			:root{
				--size: 12px;
			}
			.copyright{
				font-size: var(--size);
				text-transform: uppercase;
			}
			.copyright .stamps{
				border: 1px gray solid;
				border-radius: 999px;
				display: inline-block;
				padding: 1px 10px;
				vertical-align: middle;
				text-align: center;
				font-size: calc(var(--size) - 2px);
			}
			.copyright .stamps:not(:last-child){
				margin-right: 6px
			}
		</style>