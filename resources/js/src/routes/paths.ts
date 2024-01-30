
export const adminRoutePrefix = `/admin`
export const clientRoutePrefix = ``

export const adminRoutes = {
    admin_home: `${adminRoutePrefix}`,
    create_new_cms_page: `${adminRoutePrefix}/cms/create`,
    create_sub_cms_page: (parentId: number|string) => `${adminRoutes.create_new_cms_page}/${parentId}`,
    cms_pages_list: `${adminRoutePrefix}/cms/list`
}


export const clientRoutes = {
    page: (slug: string) => `${clientRoutePrefix}/${slug}`
}
