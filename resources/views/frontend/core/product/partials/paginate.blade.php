<div class="pagination-style">
    {{ $products->appends(request()->query())->links() }} <!-- Preserve query parameters -->
</div>
<div class="total-pages">
    <p>Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} results</p>
</div>
