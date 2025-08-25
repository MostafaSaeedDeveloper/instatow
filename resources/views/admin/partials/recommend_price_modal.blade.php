<!-- Recommend Price Modal -->
<div class="modal fade" id="recommendPriceModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="recommendPriceForm">
        <div class="modal-header">
          <h5 class="modal-title">Recommended Price</h5>
        </div>
        <div class="modal-body">
          <input type="hidden" id="lead_id" name="lead_id">

<div class="form-group mb-2">
  <label>Pickup Location</label>
  <p id="pickup_location" class="form-control-plaintext fw-bold text-dark"></p>
</div>

<div class="form-group mb-2">
  <label>Delivery Location</label>
  <p id="delivery_location" class="form-control-plaintext fw-bold text-dark"></p>
</div>

          <div class="form-group mb-2">
            <label>Recommended Price</label>
            <div class="input-group">
              <span class="input-group-text">$</span>
              <input type="number" id="recommended_price" class="form-control" readonly>
            </div>
                          <div id="price-error" class="text-danger d-none"></div>
          </div>

          <div class="form-group mb-2">
            <label>Your Final Price</label>
            <div class="input-group">
              <span class="input-group-text">$</span>
              <input type="number" id="final_price" name="final_price" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
                <button type="button" id="apply-recommended-price" class="btn btn-success">Apply Price</button>
        </div>
      </form>
    </div>
  </div>
</div>
