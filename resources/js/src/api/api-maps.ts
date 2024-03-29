const baseUrl = import.meta.env.VITE_APP_URL;
const adminApiUrl = `${baseUrl}/api/admin`
const clientApiUrl = `${baseUrl}/api`

const commonApis = {
}

export const adminApis = {
    get_all_cms_pages_list: `${adminApiUrl}/pages-list`,
    updateOrCreatePageData:  `${adminApiUrl}/update`,
    removePageById:  (pageId: string|number) => `${adminApiUrl}/remove-page/${pageId}`,

}

const clientApis = {

}
