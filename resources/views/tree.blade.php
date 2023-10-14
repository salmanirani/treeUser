<link rel="stylesheet" href="{{asset('css/tree.css')}}" />
<link rel="stylesheet" href="{{asset('js/jstree/dist/themes/default/style.min.css')}}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
<script src="{{asset('js/jstree/dist/jstree.min.js')}}"></script>

<input type="text" name="search-input" id="search-input" class="form-control">

<div id="jstree"></div>

<script>
    // تبدیل داده‌های درختی به فرمت مناسب jsTree
    var treeData = {!! json_encode($treeData) !!};
    var jstreeData = [];

    for (var i = 0; i < treeData.length; i++) {
        var node = {
            id: treeData[i].id,
            parent: treeData[i].parent === '#' ? '#' : treeData[i].parent,
            text: treeData[i].text
        };
        jstreeData.push(node);
    }

    // ایجاد درخت با استفاده از jsTree
    $(function() {
        $('#jstree').jstree({
            "plugins" : ["wholerow", "state", "search"],
            'core': {
                "themes" : {
                    "variant" : "large"
                },
                'data': jstreeData,
            }
        });

        // باز کردن همه گره‌ها به صورت پیش‌فرض
        $('#jstree').jstree('open_all');

        // جستجو در درخت
        $('#search-input').on('input', function () {
            var searchString = $(this).val();
            $('#jstree').jstree('search', searchString);
        });
    });

</script>
