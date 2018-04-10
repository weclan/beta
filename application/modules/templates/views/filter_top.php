<div class="page-title-container" >
            <div class="container">
                <div class="page-title pull-left">
                    <h4 class="entry-title">cari lokasi yang anda inginkan</h4>
                </div>
               
                <?= Modules::run('filter_nav/_draw_filter_top') ?>

                <div class="page-title pull-right">
                    <div id="search-box" class="flright">
                        <form action="#" method="post" name="search-form">
                            <input name="keywords" type="text" class="input-text full-width" id="inputString" onClick="disAutoComplete(this);" />
                        </form>
                        <div id="suggestions"></div>
                    </div>
                   
                </div>
                
                
            </div>
        </div>