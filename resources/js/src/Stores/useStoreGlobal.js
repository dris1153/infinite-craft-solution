import { create } from "zustand";

const store = () => ({});

const useStoreGlobal = create(store);

export default useStoreGlobal;

export function setStoreGlobal(x) {
    useStoreGlobal.setState(x);
}
