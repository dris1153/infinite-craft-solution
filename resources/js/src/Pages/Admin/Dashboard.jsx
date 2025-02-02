import AdminLayout from "@/src/Layouts/AdminLayout";
import { Head } from "@inertiajs/react";

export default function Dashboard() {
    return (
        <AdminLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800 flex items-center gap-[12px] p-6"></div>
                </div>
            </div>
        </AdminLayout>
    );
}
