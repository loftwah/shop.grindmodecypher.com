jQuery(document).ready(function () {
  const slug = "yaymail";
  const pluginSettingPage = "yaymail-settings";
  const REST_URL =
    window[`${slug}LicenseData`].apiSettings.restUrl;
  const ADMIN_URL =
    window[`${slug}LicenseData`].apiSettings.adminUrl;
  const POST_OPTIONS = {
    method: "POST",
    headers: {
      "Content-type": "application/json",
    },
  };

  jQuery(".yaycommerce-license-layout").on(
    "click",
    `.yaycommerce-activate-license-button[data-plugin*='${slug}']`,
    handleActivate
  );
  jQuery(".yaycommerce-license-layout").on(
    "click",
    `.yaycommerce-update-license[data-plugin*='${slug}']`,
    handleUpdate
  );
  jQuery(".yaycommerce-license-layout").on(
    "click",
    `.yaycommerce-remove-license[data-plugin*='${slug}']`,
    handleRemove
  );

  let timeout;

  async function handleActivate(event) {
    event.preventDefault();
    clearTimeout(timeout);
    const { plugin } = jQuery(this).data();
    beforeCallAPI(plugin, "activate");
    hideMessage(plugin);
    const licenseKey = jQuery(`#${plugin}_license_input`).val();

    const response = await fetch(`${REST_URL}/license/activate`, {
      ...POST_OPTIONS,
      body: JSON.stringify({
        license_key: licenseKey,
        plugin,
      }),
    }).then((response) => response.json());
    afterCallAPI(plugin, "activate");
    if (response.success) {
      replaceSuccessfullContent(response);
    } else {
      showMessage(response);
      timeout = setTimeout(()=>{
        hideMessage(plugin)
      },3000); 
    }
  }

  async function handleUpdate(event) {
    event.preventDefault();
    const { plugin } = jQuery(this).data();
    beforeCallAPI(plugin, "update");
    const response = await fetch(`${REST_URL}/license/update`, {
      ...POST_OPTIONS,
      body: JSON.stringify({
        plugin,
      }),
    }).then((response) => response.json());
    afterCallAPI(plugin, "update");
    if (response.success) {
      replaceSuccessfullContent(response);
    } else {
      replaceActivatorContent(response);
    }
  }
  async function handleRemove(event) {
    event.preventDefault();
    const { plugin } = jQuery(this).data();
    beforeCallAPI(plugin, "remove");
    const response = await fetch(`${REST_URL}/license/delete`, {
      ...POST_OPTIONS,
      body: JSON.stringify({
        plugin,
      }),
    }).then((response) => response.json());
    afterCallAPI(plugin, "remove");
    replaceActivatorContent(response);
  }

  function replaceSuccessfullContent(data) {
    jQuery(
      `#${data.slug}_license_card .yaycommerce-license-card-header-item`
    ).html(`
    ${data.name}
    <span class="yaycommerce-license-badge ${data.is_expired ? "error" : "success"}">${data.is_expired ? "Expired" : "Active"}</span>
    `);
    jQuery(`#${data.slug}_license_card .yaycommerce-license-card-body`).html(`
      <table class="yaycommerce-license-table">
        <tbody>
          <tr class="yaycommerce-license-tr">
            <td class="yaycommerce-license-key-text" >Your License Key:</td>
            <td class="yaycommerce-license-text">
              <input type="text" disabled value="${
                data.formatted_license_key
              }" />
            </td>
            <td>
              <button class="button yaycommerce-update-license" data-plugin="${data.slug}">
                <span>Update</span>
                <span class="activate-loading sync-loading">
                  <svg
                  data-v-7957300f=""
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  >
                    <path
                    data-v-7957300f=""
                    d="M21.66 10.37a.62.62 0 00.07-.19l.75-4a1 1 0 00-2-.36l-.37 2a9.22 9.22 0 00-16.58.84 1 1 0 00.55 1.3 1 1 0 001.31-.55A7.08 7.08 0 0112.07 5a7.17 7.17 0 016.24 3.58l-1.65-.27a1 1 0 10-.32 2l4.25.71h.16a.93.93 0 00.34-.06.33.33 0 00.1-.06.78.78 0 00.2-.11l.08-.1a1.07 1.07 0 00.14-.16.58.58 0 00.05-.16zM19.88 14.07a1 1 0 00-1.31.56A7.08 7.08 0 0111.93 19a7.17 7.17 0 01-6.24-3.58l1.65.27h.16a1 1 0 00.16-2L3.41 13a.91.91 0 00-.33 0H3a1.15 1.15 0 00-.32.14 1 1 0 00-.18.18l-.09.1a.84.84 0 00-.07.19.44.44 0 00-.07.17l-.75 4a1 1 0 00.8 1.22h.18a1 1 0 001-.82l.37-2a9.22 9.22 0 0016.58-.83 1 1 0 00-.57-1.28z"
                    ></path>
                  </svg>
                </span>  
              </button>
              <button class="button yaycommerce-remove-license" data-plugin="${data.slug}">
                <span>Remove</span>
                <span class="activate-loading sync-loading">
                  <svg
                  data-v-7957300f=""
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  >
                    <path
                    data-v-7957300f=""
                    d="M21.66 10.37a.62.62 0 00.07-.19l.75-4a1 1 0 00-2-.36l-.37 2a9.22 9.22 0 00-16.58.84 1 1 0 00.55 1.3 1 1 0 001.31-.55A7.08 7.08 0 0112.07 5a7.17 7.17 0 016.24 3.58l-1.65-.27a1 1 0 10-.32 2l4.25.71h.16a.93.93 0 00.34-.06.33.33 0 00.1-.06.78.78 0 00.2-.11l.08-.1a1.07 1.07 0 00.14-.16.58.58 0 00.05-.16zM19.88 14.07a1 1 0 00-1.31.56A7.08 7.08 0 0111.93 19a7.17 7.17 0 01-6.24-3.58l1.65.27h.16a1 1 0 00.16-2L3.41 13a.91.91 0 00-.33 0H3a1.15 1.15 0 00-.32.14 1 1 0 00-.18.18l-.09.1a.84.84 0 00-.07.19.44.44 0 00-.07.17l-.75 4a1 1 0 00.8 1.22h.18a1 1 0 001-.82l.37-2a9.22 9.22 0 0016.58-.83 1 1 0 00-.57-1.28z"
                    ></path>
                  </svg>
                </span>  
              </button>
            </td>
          </tr>
          <tr class="yaycommerce-license-tr">
            <td class="yaycommerce-license-key-text" >Expiration Date:</td>
            <td class="yaycommerce-license-text">
              ${data.expires} 
              ${
                data.is_expired
                  ? `<strong class="yaycommerce-license-expired-text">(Expired)</strong>`
                  : ""
              }
            </td>
          </tr>
        </tbody>
      </table>
      <p>
        ${
          !data.is_expired
            ? `<a href="${ADMIN_URL}admin.php?page=${pluginSettingPage}"><strong>Start customizing</strong></a>`
            : ""
        }
      </p>
      <p>Need more licenses? <a class="yaycommerce-license-buy-now" href="${data.plugin_url}" target="_blank">Buy Now</a></p>
      ${
        data.is_expired
          ? `<p><strong class="yaycommerce-license-expired-text">Your license is expired! <a href="${data.renewal_url}" class="yaycommerce-license-expired-text" target="_blank">Renew Now!</a></strong></p>`
          : ""
      }
      
    `);
  }
  function replaceActivatorContent(data) {
    jQuery(`#${data.slug}_license_card .yaycommerce-license-card-header-item`).html(
      `${data.name} activation`
    );
    jQuery(`#${data.slug}_license_card .yaycommerce-license-card-body`).html(`
    <div class="yaycommerce-license-control">
			<div class="yaycommerce-license-text" for="inspector-select-control-text">Enter a license key</div>
			<div class="yaycommerce-license-base-control">
				<div class="yaycommerce-license-base-control-field">
					<input class="yaycommerce-license-text-control-input yaycommerce-license-input" type="password" id="${data.slug}_license_input" value="" />
					<button class="button-primary yaycommerce-activate-license-button"  id="${data.slug}_activate_button" data-plugin="${data.slug}">
						<span>Activate License</span>
						<span class="activate-loading sync-loading">
							<svg
							data-v-7957300f=""
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 24 24"
							>
								<path
								data-v-7957300f=""
								d="M21.66 10.37a.62.62 0 00.07-.19l.75-4a1 1 0 00-2-.36l-.37 2a9.22 9.22 0 00-16.58.84 1 1 0 00.55 1.3 1 1 0 001.31-.55A7.08 7.08 0 0112.07 5a7.17 7.17 0 016.24 3.58l-1.65-.27a1 1 0 10-.32 2l4.25.71h.16a.93.93 0 00.34-.06.33.33 0 00.1-.06.78.78 0 00.2-.11l.08-.1a1.07 1.07 0 00.14-.16.58.58 0 00.05-.16zM19.88 14.07a1 1 0 00-1.31.56A7.08 7.08 0 0111.93 19a7.17 7.17 0 01-6.24-3.58l1.65.27h.16a1 1 0 00.16-2L3.41 13a.91.91 0 00-.33 0H3a1.15 1.15 0 00-.32.14 1 1 0 00-.18.18l-.09.1a.84.84 0 00-.07.19.44.44 0 00-.07.17l-.75 4a1 1 0 00.8 1.22h.18a1 1 0 001-.82l.37-2a9.22 9.22 0 0016.58-.83 1 1 0 00-.57-1.28z"
								></path>
							</svg>
						</span>
					</button>
				</div>
				<p>To receive updates, please enter your valid ${data.name} license key</p>
			</div>
			<div class="yaycommerce-license-text" for="inspector-select-control-text">By activating ${data.name}, you'll have:</div>
			<ul class="yaycommerce-license-in-feature">
				<li>Auto-update to the latest version</li>
				<li>Premium Technical Support</li>
				<li>Live Chat 1-1 on Facebook for any questions</li>
			</ul>
		</div>
    `);
  }
  function showMessage(data) {
    const { slug, success, message } = data;
    jQuery(`#${slug}_license_card .yaycommerce-license-message`).addClass("show");
    if (!success) {
      jQuery(`#${slug}_license_card .yaycommerce-license-message`).html(`
      <span>${message}</span>
      `);
    }
  }
  function hideMessage(slug) {
    jQuery(`#${slug}_license_card .yaycommerce-license-message`).removeClass(
      "show"
    );
    jQuery(`#${slug}_license_card .yaycommerce-license-message`).html("");
  }

  function beforeCallAPI(plugin, action) {
    if (action === "activate") {
      jQuery(`.yaycommerce-activate-license-button[data-plugin=${plugin}]`)
        .find(".activate-loading")
        .css("display", "inline-flex");
    }

    if (action === "update") {
      jQuery(`.yaycommerce-update-license[data-plugin=${plugin}]`)
        .find(".activate-loading")
        .css("display", "inline-flex");
    }

    if (action === "remove") {
      jQuery(`.yaycommerce-remove-license[data-plugin=${plugin}]`)
        .find(".activate-loading")
        .css("display", "inline-flex");
    }

    jQuery(`.yaycommerce-activate-license-button[data-plugin=${plugin}]`).attr(
      "disabled",
      true
    );
    jQuery(`.yaycommerce-update-license[data-plugin=${plugin}]`).attr(
      "disabled",
      true
    );
    jQuery(`.yaycommerce-remove-license[data-plugin="${plugin}"]`).attr(
      "disabled",
      true
    );
  }

  function afterCallAPI(plugin, action) {
    if (action === "activate") {
      jQuery(`.yaycommerce-activate-license-button[data-plugin=${plugin}]`)
        .find(".activate-loading")
        .hide();
    }

    if (action === "update") {
      jQuery(`.yaycommerce-update-license[data-plugin=${plugin}]`)
        .find(".activate-loading")
        .hide();
    }

    if (action === "remove") {
      jQuery(`.yaycommerce-remove-license[data-plugin=${plugin}]`)
        .find(".activate-loading")
        .hide();
    }
    jQuery(`.yaycommerce-activate-license-button[data-plugin=${plugin}]`).attr(
      "disabled",
      false
    );
    jQuery(`.yaycommerce-update-license[data-plugin=${plugin}]`).attr(
      "disabled",
      false
    );
    jQuery(`.yaycommerce-remove-license[data-plugin="${plugin}"]`).attr(
      "disabled",
      false
    );
  }
});
